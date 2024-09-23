<div class="form-find text-start mt-40 wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
    <form method="GET" action="{{route('client.job.index')}}">
        <div class="box-industry">
            <select class="form-input mr-10 select-active input-industry" name="category">
                <option value="">Ngành</option>
                @foreach($jobCategories as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
        <select class="form-input mr-10 select-active" name="location">
            <option value="">Vị Trí</option>
            @foreach($provinces as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
            @endforeach
        </select>
        <div class="box-industry">
            <select class="form-input mr-10 select-active input-industry" name="salary">
                <option value="">Mức lương</option>
                @foreach($salaries as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="box-industry">
            <select class="form-input mr-10 select-active input-industry" name="experience">
                <option value="">Kinh nghiệm</option>
                @foreach($experiences as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
        <input class="form-input input-keysearch mr-10" name="keyword" type="text" placeholder="Từ khóa... ">
        <button class="btn btn-default btn-find font-sm">Tìm Kiếm</button>
    </form>
</div>
