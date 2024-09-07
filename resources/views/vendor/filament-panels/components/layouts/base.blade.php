<!-- resources/views/vendor/filament/components/layouts/base.blade.php -->
<x-filament::layouts.base :title="$title">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-nNM/ODRKC9Mk9TrEmLQ+/Caz3rhDP2TW+aKt4D+5xjIu5B1KDqQ2wxl5tI91t6je" crossorigin="anonymous">

    <!-- Filament Styles (Tailwind CSS) -->
    @filamentStyles

    {{ $slot }}

    <!-- Filament Scripts -->
    @filamentScripts

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-mQ93ZVv6Bp0Q22EhZcsVJY8BLW0v+7zOeF7n0/+M0zS2lY3sHk4M5s9Yz7IPlXZK" crossorigin="anonymous"></script>
</x-filament::layouts.base>
