<?php

namespace App\Repositories\Filter;

use App\Models\Job_category;
use App\Models\JobPost;
use App\Models\Salary;
use App\Repositories\Filter\FilterInterface;
use Illuminate\Support\Facades\DB;

class FilterRepository implements FilterInterface
{
    protected $jobPost;
    protected $jobCategory;
    protected $salary;

    public function __construct(JobPost $jobPost, Job_category $jobCategory, Salary $salary)
    {
        $this->jobPost = $jobPost;
        $this->jobCategory = $jobCategory;
        $this->salary = $salary;
    }

    public function filterJob($selectedCategories = [], $selectedSalaries = [], $selectedKeywords = [])
    {
        $jobCategories = $this->jobCategory
            ->withCount('jobPosts')
            ->get();

        $salaries = $this->salary
            ->withCount('jobPosts')
            ->get();

        $keywords = DB::table('job_posts')
            ->select(DB::raw('meta_keyword'))
            ->whereNotNull('meta_keyword')
            ->get()
            ->flatMap(function ($jobPost) {
                // Tách chuỗi meta_keyword thành mảng các từ khóa
                return explode(',', $jobPost->meta_keyword);
            })
            ->map(function ($keyword) {
                return trim($keyword); // Loại bỏ khoảng trắng thừa
            })
            ->filter() // Lọc ra những giá trị trống
            ->countBy() // Đếm số lần xuất hiện của mỗi từ khóa
            ->map(function ($count, $keyword) {
                return ['keyword' => $keyword, 'job_count' => $count];
            })
            ->sortByDesc('job_count') // Sắp xếp từ khóa theo số lượng công việc giảm dần
            ->take(5); // Giới hạn chỉ lấy 5 từ khóa

        $jobs = $this->jobPost->query();

        if (!empty($selectedCategories)) {
            $jobs->whereIn('job_category_id', $selectedCategories);
        }

        if (!empty($selectedSalaries)) {
            $jobs->whereIn('salary_id', $selectedSalaries);
        }

        if (!empty($selectedKeywords)) {
            $jobs->where(function ($query) use ($selectedKeywords) {
                foreach ($selectedKeywords as $keyword) {
                    $query->orWhere('meta_keyword', 'LIKE', '%' . $keyword . '%');
                }
            });
        }

        return [
            'categories' => $jobCategories,
            'salaries' => $salaries,
            'keywords' => $keywords->values()->all(),
            'jobs' => $jobs,
        ];
    }
}
