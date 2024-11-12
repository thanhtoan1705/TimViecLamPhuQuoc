<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Phòng họp trực tuyến</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#3C65F5',
                        secondary: '#2851E3',
                    }
                }
            }
        }
    </script>
</head>
<body class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 font-[Inter]">
<!-- Navbar -->
<nav class="bg-white shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <a href="{{ route('client.client.video-call') }}" class="flex items-center">
                    <img src="{{ asset('assets/client/images/logo.png') }}" alt="Jobbox" class="h-8 w-auto">
                    {{-- <span class="ml-2 text-xl font-semibold text-primary">Jobbox</span> --}}
                </a>
            </div>

            <div class="flex items-center space-x-4">
                <a href="/"
                   class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 hover:text-primary transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    Trang chủ
                </a>
                <a href="{{ route('client.client.video-call') }}"
                   class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-primary hover:bg-secondary transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Tạo phòng
                </a>
            </div>
        </div>
    </div>
</nav>

<!-- Main Content -->
<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="max-w-md mx-auto">
        <div class="bg-white shadow-xl rounded-2xl p-8">
            <div class="text-center mb-8">
                <h2 class="text-2xl font-bold text-gray-900">👋 Chào mừng đến với phòng họp</h2>
                <p class="mt-2 text-sm text-gray-600">Nhập thông tin để bắt đầu cuộc họp</p>
            </div>

            <form id="lobby__form" action="{{ route('client.client.room') }}" method="GET" class="space-y-6">
                @csrf
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Tên của bạn</label>
                    <div class="mt-1">
                        <input type="text" name="name" id="name" required
                               class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-primary focus:border-primary"
                               placeholder="Nhập tên hiển thị của bạn...">
                    </div>
                </div>

                <div>
                    <label for="room" class="block text-sm font-medium text-gray-700">Tên phòng</label>
                    <div class="mt-1">
                        <input type="text" name="room" id="room" required
                               class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-primary focus:border-primary"
                               placeholder="Nhập tên phòng...">
                    </div>
                </div>

                <div>
                    <button type="submit"
                            class="w-full flex justify-center items-center px-4 py-3 border border-transparent text-sm font-medium rounded-md text-white bg-primary hover:bg-secondary focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-colors">
                        <span>Tham gia phòng họp</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>
</body>
</html>
