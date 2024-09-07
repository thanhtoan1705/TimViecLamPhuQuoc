<div>
    <div class="row">
        @forelse ($promotions as $promotion)
            <div class="col">
                <div class="card">
                    <div class="vertical-tab">TOPECOPLUS</div>
                    <div class="card-body">
                        <h5 class="card-title">
                            Giảm: {{ number_format($promotion->discount, 0, ',', '.') }} VND
                        </h5>
                        @if ($status === 1)
                            <p class="mo-ta">
                                Thời gian còn lại: {{ \App\Helper\PromotionHelper\PromotionHelper::getTimeRemaining($promotion->end_time) }}
                            </p>
                            <div class="ma-giam-gia">
                                <p class="text-danger text-center">
                                    <strong style="margin-right: 5px">{{ $promotion->code }}</strong>
                                </p>
                                <a href="" class="btn btn-danger">Dùng ngay</a>
                            </div>
                        @elseif ($status === 0)
                            <p class="mo-ta">Đã sử dụng vui lòng liên hệ: 0354233642 để biết thêm chi tiết</p>
                            <div class="ma-giam-gia">
                                <p class="text-danger text-center">
                                    <strong style="margin-right: 5px">{{ $promotion->code }}</strong>
                                </p>
                                <a href="tel:0354233642" class="btn btn-danger">Liên hệ</a>
                            </div>
                        @elseif ($status === 2)
                            <p class="mo-ta">Đã hết hạn vui lòng liên hệ: 0354233642 để biết thêm chi tiết</p>
                            <div class="ma-giam-gia">
                                <p class="text-danger text-center">
                                    <strong style="margin-right: 5px">{{ $promotion->code }}</strong>
                                </p>
                                <a href="tel:0354233642" class="btn btn-danger">Liên hệ</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div style="display: flex; flex-direction: column; align-items: center; padding-left: 40%">
                <img
                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ4MTN2bQzCBeBpWdpYUrMHeuQsx3NA7kyMTw&s"
                    alt="CV Icon" class="img-fluid" style="width: 100px;">
                <p class="mt-3">Không có mã giảm giá nào</p>
            </div>
        @endforelse
    </div>
    {{ $promotions->links() }}
</div>
