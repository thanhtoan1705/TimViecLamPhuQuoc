<div class="form-find text-start mt-40 wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
    <form method="GET" action="{{route('client.job.index')}}">
        <div class="box-industry">
            <select class="form-input mr-2 select-active input-industry" name="category">
                <option value="">Ngành</option>
                @foreach($jobCategories as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="box-industry">
            <select class="form-input mr-2 select-active input-industry" name="location">
                <option value="">Vị Trí</option>
                @foreach($provinces as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="box-industry">
            <select class="form-input mr-2 select-active input-industry" name="salary">
                <option value="">Mức lương</option>
                @foreach($salaries as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="box-industry">
            <select class="form-input mr-2 select-active input-industry" name="experience">
                <option value="">Kinh nghiệm</option>
                @foreach($experiences as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
        <input class="form-input input-keysearch mr-2" name="keyword" type="text" placeholder="Từ khóa... ">
        <button class="btn btn-default btn-find font-sm d-block d-md-none d-lg-block">Tìm Kiếm</button>

        <button class="btn btn-default font-sm d-none d-md-block d-lg-none">
            <i class="bi bi-search"></i>
        </button>
    </form>
</div>
