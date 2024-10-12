<?php

namespace Database\Seeders;

use App\Models\CvTemplate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CvTemplateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CvTemplate::create([
            'template_name' => 'Template CV Mẫu 1',
            'template_description' => 'Mẫu CV cơ bản cho vị trí nhân viên văn phòng.',
            'template_content' => '<div class="cv-page">
    <div class="container mt-5 mb-5">
        <div class="row cv-container p-4">
            <!-- Cột bên trái -->
            <div class="col-md-4 bg-light p-3 rounded">
                <!-- Thông tin cá nhân và avatar -->
                <section class="text-center mb-4">
                    {{avatar}}
                    <h4 class="mt-3">{{name}}</h4>
                    <p><i class="fas fa-map-marker-alt me-2"></i>{{address}}</p>
                    <p><i class="fas fa-phone me-2"></i>{{phone}}</p>
                    <p><i class="fas fa-envelope me-2"></i>{{email}}</p>
                    <p><i class="fab fa-linkedin me-2"></i> <a href="{{linkedin}}">LinkedIn</a></p>
                    <p><i class="fab fa-github me-2"></i> <a href="{{github}}">GitHub</a></p>
                    <p><i class="fas fa-globe me-2"></i> <a href="{{website}}">Website</a></p>
                </section>

                <!-- Kỹ năng -->
                <section class="mb-4">
                    <h5 class="section-title">{{title_skills}}</h5>
                    <ul class="list-unstyled">
                        {{#each skills}}
                        <li><i class="fas fa-check me-2"></i>{{this}}</li>
                        {{/each}}
                    </ul>
                </section>

                <!-- Chứng chỉ -->
                <section class="mb-4">
                    <h5 class="section-title">{{title_certificates}}</h5>
                    <ul class="list-unstyled">
                        {{#each certificates}}
                        <li><i class="fas fa-certificate me-2"></i>{{this}}</li>
                        {{/each}}
                    </ul>
                </section>

                <!-- Ngoại ngữ -->
                <section class="mb-4">
                    <h5 class="section-title">{{title_languages}}</h5>
                    <ul class="list-unstyled">
                        {{#each languages}}
                        <li><i class="fas fa-language me-2"></i>{{this}}</li>
                        {{/each}}
                    </ul>
                </section>
            </div>

            <!-- Cột bên phải -->
            <div class="col-md-8 p-3">
                <!-- Mục tiêu nghề nghiệp -->
                <section class="mb-4">
                    <h5 class="section-title">{{title_career_objective}}</h5>
                    <p>{{career_objective}}</p>
                </section>

                <!-- Kinh nghiệm làm việc -->
                <section class="mb-4">
                    <h5 class="section-title">{{title_work_experience}}</h5>
                    <div>
                        {{#each work_experience}}
                        <div class="mb-3 p-2 border-bottom">
                            <h6 class="font-weight-bold">{{this.position}} - {{this.company}}</h6>
                            <p class="text-muted">{{this.start_date}} - {{this.end_date}}</p>
                            <p>{{this.responsibilities}}</p>
                        </div>
                        {{/each}}
                    </div>
                </section>

                <!-- Học vấn -->
                <section class="mb-4">
                    <h5 class="section-title">{{title_education}}</h5>
                    <div>
                        {{#each education}}
                        <div class="mb-3">
                            <h6>{{this.degree}} - {{this.university}}</h6>
                            <p class="text-muted">{{this.start_year}} - {{this.end_year}}</p>
                            <p><strong>GPA:</strong> {{this.gpa}}</p>
                        </div>
                        {{/each}}
                    </div>
                </section>

                <!-- Dự án -->
                <section class="mb-4">
                    <h5 class="section-title">{{title_projects}}</h5>
                    <div>
                        {{#each projects}}
                        <div class="mb-3">
                            <h6>{{this.name}}</h6>
                            <p>{{this.description}}</p>
                            <p><strong>Technologies used:</strong> {{this.technologies}}</p>
                        </div>
                        {{/each}}
                    </div>
                </section>

                <!-- Giải thưởng -->
                <section class="mb-4">
                    <h5 class="section-title">{{title_awards}}</h5>
                    <ul class="list-unstyled">
                        {{#each awards}}
                        <li><i class="fas fa-award me-2"></i>{{this}}</li>
                        {{/each}}
                    </ul>
                </section>

                <!-- Hoạt động ngoại khóa -->
                <section class="mb-4">
                    <h5 class="section-title">{{title_extracurricular}}</h5>
                    <ul class="list-unstyled">
                        {{#each extracurricular}}
                        <li><i class="fas fa-user-friends me-2"></i>{{this}}</li>
                        {{/each}}
                    </ul>
                </section>

                <!-- Tham chiếu -->
                <section class="mb-4">
                    <h5 class="section-title">{{title_references}}</h5>
                    <p>{{references}}</p>
                </section>
            </div>
        </div>
    </div>
</div>',
        ]);

        CvTemplate::create([
            'template_name' => 'Template CV Mẫu 2',
            'template_description' => 'Mẫu CV dành cho kỹ sư.',
            'template_content' => '<div class="cv-page">
    <div class="container mt-5 mb-5">
        <div class="row cv-container p-4">
            <!-- Cột bên trái -->
            <div class="col-md-4 bg-light p-3 rounded">
                <!-- Thông tin cá nhân và avatar -->
                <section class="text-center mb-4">
                    {{avatar}}
                    <h4 class="mt-3">{{name}}</h4>
                    <p><i class="fas fa-map-marker-alt me-2"></i>{{address}}</p>
                    <p><i class="fas fa-phone me-2"></i>{{phone}}</p>
                    <p><i class="fas fa-envelope me-2"></i>{{email}}</p>
                    <p><i class="fab fa-linkedin me-2"></i> <a href="{{linkedin}}">LinkedIn</a></p>
                    <p><i class="fab fa-github me-2"></i> <a href="{{github}}">GitHub</a></p>
                    <p><i class="fas fa-globe me-2"></i> <a href="{{website}}">Website</a></p>
                </section>

                <!-- Kỹ năng -->
                <section class="mb-4">
                    <h5 class="section-title">{{title_skills}}</h5>
                    <ul class="list-unstyled">
                        {{#each skills}}
                        <li><i class="fas fa-check me-2"></i>{{this}}</li>
                        {{/each}}
                    </ul>
                </section>

                <!-- Chứng chỉ -->
                <section class="mb-4">
                    <h5 class="section-title">{{title_certificates}}</h5>
                    <ul class="list-unstyled">
                        {{#each certificates}}
                        <li><i class="fas fa-certificate me-2"></i>{{this}}</li>
                        {{/each}}
                    </ul>
                </section>

                <!-- Ngoại ngữ -->
                <section class="mb-4">
                    <h5 class="section-title">{{title_languages}}</h5>
                    <ul class="list-unstyled">
                        {{#each languages}}
                        <li><i class="fas fa-language me-2"></i>{{this}}</li>
                        {{/each}}
                    </ul>
                </section>
            </div>

            <!-- Cột bên phải -->
            <div class="col-md-8 p-3">
                <!-- Mục tiêu nghề nghiệp -->
                <section class="mb-4">
                    <h5 class="section-title">{{title_career_objective}}</h5>
                    <p>{{career_objective}}</p>
                </section>

                <!-- Kinh nghiệm làm việc -->
                <section class="mb-4">
                    <h5 class="section-title">{{title_work_experience}}</h5>
                    <div>
                        {{#each work_experience}}
                        <div class="mb-3 p-2 border-bottom">
                            <h6 class="font-weight-bold">{{this.position}} - {{this.company}}</h6>
                            <p class="text-muted">{{this.start_date}} - {{this.end_date}}</p>
                            <p>{{this.responsibilities}}</p>
                        </div>
                        {{/each}}
                    </div>
                </section>

                <!-- Học vấn -->
                <section class="mb-4">
                    <h5 class="section-title">{{title_education}}</h5>
                    <div>
                        {{#each education}}
                        <div class="mb-3">
                            <h6>{{this.degree}} - {{this.university}}</h6>
                            <p class="text-muted">{{this.start_year}} - {{this.end_year}}</p>
                            <p><strong>GPA:</strong> {{this.gpa}}</p>
                        </div>
                        {{/each}}
                    </div>
                </section>

                <!-- Dự án -->
                <section class="mb-4">
                    <h5 class="section-title">{{title_projects}}</h5>
                    <div>
                        {{#each projects}}
                        <div class="mb-3">
                            <h6>{{this.name}}</h6>
                            <p>{{this.description}}</p>
                            <p><strong>Technologies used:</strong> {{this.technologies}}</p>
                        </div>
                        {{/each}}
                    </div>
                </section>

                <!-- Giải thưởng -->
                <section class="mb-4">
                    <h5 class="section-title">{{title_awards}}</h5>
                    <ul class="list-unstyled">
                        {{#each awards}}
                        <li><i class="fas fa-award me-2"></i>{{this}}</li>
                        {{/each}}
                    </ul>
                </section>

                <!-- Hoạt động ngoại khóa -->
                <section class="mb-4">
                    <h5 class="section-title">{{title_extracurricular}}</h5>
                    <ul class="list-unstyled">
                        {{#each extracurricular}}
                        <li><i class="fas fa-user-friends me-2"></i>{{this}}</li>
                        {{/each}}
                    </ul>
                </section>

                <!-- Tham chiếu -->
                <section class="mb-4">
                    <h5 class="section-title">{{title_references}}</h5>
                    <p>{{references}}</p>
                </section>
            </div>
        </div>
    </div>
</div>',
        ]);
    }
}
