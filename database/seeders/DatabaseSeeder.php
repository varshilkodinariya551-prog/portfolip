<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin User
        User::create([
            'name' => 'Varshil',
            'email' => 'admin@portfolio.dev',
            'password' => Hash::make('password'),
        ]);

        // Projects
        $projects = [
            [
                'title' => 'E-Commerce Platform',
                'slug' => 'e-commerce-platform',
                'description' => 'A full-stack e-commerce platform with payment integration, inventory management, and real-time order tracking.',
                'long_description' => 'Built a comprehensive e-commerce solution featuring user authentication, product catalog with advanced filtering, shopping cart, Stripe payment integration, order management dashboard, and real-time inventory tracking. The platform handles thousands of concurrent users with optimized database queries and caching strategies.',
                'tech_stack' => 'Laravel, Vue.js, MySQL, Redis, Stripe API, Docker',
                'live_url' => 'https://example.com',
                'github_url' => 'https://github.com/varshil/ecommerce',
                'featured' => true,
                'sort_order' => 1,
            ],
            [
                'title' => 'Task Management System',
                'slug' => 'task-management-system',
                'description' => 'A collaborative project management tool with real-time updates, Kanban boards, and team analytics.',
                'long_description' => 'Developed a real-time collaborative project management application featuring Kanban boards, Gantt charts, time tracking, team chat, file sharing, and comprehensive analytics dashboards. Implemented WebSocket connections for instant updates across all connected clients.',
                'tech_stack' => 'React, Node.js, PostgreSQL, Socket.io, AWS',
                'live_url' => 'https://example.com',
                'github_url' => 'https://github.com/varshil/taskmanager',
                'featured' => true,
                'sort_order' => 2,
            ],
            [
                'title' => 'AI Content Generator',
                'slug' => 'ai-content-generator',
                'description' => 'An AI-powered content generation tool leveraging GPT APIs for blog posts, social media, and marketing copy.',
                'long_description' => 'Created an intelligent content generation platform that uses OpenAI GPT APIs to produce high-quality blog posts, social media captions, email campaigns, and marketing copy. Features include content templates, tone adjustment, SEO optimization suggestions, and a collaborative editing workspace.',
                'tech_stack' => 'Python, FastAPI, React, OpenAI API, MongoDB',
                'live_url' => 'https://example.com',
                'github_url' => 'https://github.com/varshil/ai-content',
                'featured' => true,
                'sort_order' => 3,
            ],
            [
                'title' => 'Real-Time Chat Application',
                'slug' => 'real-time-chat-application',
                'description' => 'A modern messaging platform with end-to-end encryption, file sharing, and video calling capabilities.',
                'long_description' => 'Built a secure, real-time chat application with features including private and group messaging, end-to-end encryption, file and media sharing, voice and video calling via WebRTC, message search, and typing indicators. Optimized for performance with message pagination and lazy loading.',
                'tech_stack' => 'Next.js, TypeScript, Socket.io, WebRTC, Redis',
                'featured' => true,
                'sort_order' => 4,
            ],
            [
                'title' => 'DevOps Dashboard',
                'slug' => 'devops-dashboard',
                'description' => 'A centralized monitoring dashboard for CI/CD pipelines, server health, and deployment management.',
                'long_description' => 'Designed and built a comprehensive DevOps monitoring dashboard that aggregates data from multiple CI/CD pipelines, monitors server health metrics, manages deployments, and provides alerting. Integrates with GitHub Actions, Jenkins, Docker, and Kubernetes for a unified operations view.',
                'tech_stack' => 'Go, React, Grafana, Docker, Kubernetes, Prometheus',
                'featured' => true,
                'sort_order' => 5,
            ],
            [
                'title' => 'Portfolio CMS',
                'slug' => 'portfolio-cms',
                'description' => 'A customizable portfolio content management system built for developers and designers.',
                'long_description' => 'Created a flexible CMS specifically designed for portfolios, featuring drag-and-drop page builders, theme customization, SEO tools, blog integration, and analytics. Built with a modular architecture allowing easy extension through plugins.',
                'tech_stack' => 'Laravel, Alpine.js, Tailwind CSS, SQLite',
                'featured' => true,
                'sort_order' => 6,
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }

        // Skills
        $skills = [
            // Backend
            ['name' => 'PHP', 'category' => 'Backend', 'proficiency' => 95, 'icon' => 'fab fa-php', 'sort_order' => 1],
            ['name' => 'Laravel', 'category' => 'Backend', 'proficiency' => 92, 'icon' => 'fab fa-laravel', 'sort_order' => 2],
            ['name' => 'Python', 'category' => 'Backend', 'proficiency' => 85, 'icon' => 'fab fa-python', 'sort_order' => 3],
            ['name' => 'Node.js', 'category' => 'Backend', 'proficiency' => 88, 'icon' => 'fab fa-node-js', 'sort_order' => 4],
            ['name' => 'Go', 'category' => 'Backend', 'proficiency' => 70, 'icon' => 'fas fa-code', 'sort_order' => 5],

            // Frontend
            ['name' => 'JavaScript', 'category' => 'Frontend', 'proficiency' => 93, 'icon' => 'fab fa-js', 'sort_order' => 1],
            ['name' => 'React', 'category' => 'Frontend', 'proficiency' => 88, 'icon' => 'fab fa-react', 'sort_order' => 2],
            ['name' => 'Vue.js', 'category' => 'Frontend', 'proficiency' => 90, 'icon' => 'fab fa-vuejs', 'sort_order' => 3],
            ['name' => 'TypeScript', 'category' => 'Frontend', 'proficiency' => 85, 'icon' => 'fas fa-code', 'sort_order' => 4],
            ['name' => 'HTML/CSS', 'category' => 'Frontend', 'proficiency' => 97, 'icon' => 'fab fa-html5', 'sort_order' => 5],

            // DevOps & Tools
            ['name' => 'Docker', 'category' => 'DevOps', 'proficiency' => 82, 'icon' => 'fab fa-docker', 'sort_order' => 1],
            ['name' => 'AWS', 'category' => 'DevOps', 'proficiency' => 78, 'icon' => 'fab fa-aws', 'sort_order' => 2],
            ['name' => 'Git', 'category' => 'DevOps', 'proficiency' => 95, 'icon' => 'fab fa-git-alt', 'sort_order' => 3],
            ['name' => 'Linux', 'category' => 'DevOps', 'proficiency' => 85, 'icon' => 'fab fa-linux', 'sort_order' => 4],
            ['name' => 'CI/CD', 'category' => 'DevOps', 'proficiency' => 80, 'icon' => 'fas fa-sync-alt', 'sort_order' => 5],

            // Database
            ['name' => 'MySQL', 'category' => 'Database', 'proficiency' => 90, 'icon' => 'fas fa-database', 'sort_order' => 1],
            ['name' => 'PostgreSQL', 'category' => 'Database', 'proficiency' => 85, 'icon' => 'fas fa-database', 'sort_order' => 2],
            ['name' => 'MongoDB', 'category' => 'Database', 'proficiency' => 80, 'icon' => 'fas fa-database', 'sort_order' => 3],
            ['name' => 'Redis', 'category' => 'Database', 'proficiency' => 82, 'icon' => 'fas fa-database', 'sort_order' => 4],
        ];

        foreach ($skills as $skill) {
            Skill::create($skill);
        }

        // Settings
        $settings = [
            'hero_title' => 'Varshil',
            'hero_subtitle' => 'Software Engineer',
            'hero_description' => 'I craft elegant, scalable software solutions that solve real-world problems. Passionate about clean code, system design, and building products that make a difference.',
            'about_text' => 'I\'m a passionate Software Engineer with expertise in full-stack development, system design, and cloud architecture. With years of experience building scalable applications, I specialize in creating robust, maintainable solutions using modern technologies. I love tackling complex challenges and turning ideas into reality through clean, efficient code.',
            'github_url' => 'https://github.com/varshil',
            'linkedin_url' => 'https://linkedin.com/in/varshil',
            'twitter_url' => 'https://twitter.com/varshil',
            'email' => 'varshil@portfolio.dev',
            'resume_url' => '#',
            'location' => 'India',
            'phone' => '',
        ];

        foreach ($settings as $key => $value) {
            Setting::set($key, $value);
        }
    }
}
