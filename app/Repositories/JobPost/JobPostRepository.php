<?php

namespace App\Repositories\JobPost;

use App\Models\JobPost;

class JobPostRepository implements JobPostInterface
{
    protected $jobPost;

    public function __construct(JobPost $jobPost)
    {
        $this->jobPost = $jobPost;
    }

    public function topEmployers($limit = 10)
    {
        return $this->jobPost
            ->with([
                'employer.address.ward.district.province'
            ])
            ->selectRaw('employer_id, COUNT(*) as total_jobs')
            ->groupBy('employer_id')
            ->orderBy('total_jobs', 'DESC')
            ->limit($limit)
            ->get()
            ->map(function ($jobPost) {
                $employer = $jobPost->employer;
                $address = $employer->address;

                $fullAddress = $address->street . ', ' .
                    $address->ward->name . ', ' .
                    $address->district->name . ', ' .
                    $address->province->name;

                return [
                    'company_name' => $employer->company_name,
                    'company_logo' => $employer->company_logo,
                    'street' => $address->street,
                    'ward_name' => $address->ward->name,
                    'district_name' => $address->district->name,
                    'province_name' => $address->province->name,
                    'total_jobs' => $jobPost->total_jobs,
                ];
            });
    }

    public function getAllJobPost($limit = 10)
    {
        $jobPosts = $this->jobPost->limit($limit)->get();

        $jobPosts = $jobPosts->groupBy(function ($item) {
            return $item->job_category->name;
        });


        return $jobPosts;
    }
}
