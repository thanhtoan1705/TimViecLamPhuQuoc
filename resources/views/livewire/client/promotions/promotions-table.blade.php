<div style="height: 100%;">
    @if($promotions->count() > 0)
        <div class="row">
            @foreach($promotions as $promotion)
                <div class="col">
                    <div class="card">
                        <div class="vertical-tab">TOPECOPLUS</div>
                        <div class="card-body">
                            <h5 class="card-title">
                                Giảm: {{ number_format($promotion->discount, 0, ',', '.') }} VND
                            </h5>
                            @if ($statusCode === 1)
                                <p class="mo-ta">
                                    Thời gian còn lại: {{ \App\Helper\PromotionHelper\PromotionHelper::getTimeRemaining($promotion->end_time) }}
                                </p>
                                <div class="ma-giam-gia">
                                    <p class="text-danger text-center">
                                        <strong style="margin-right: 5px">{{ $promotion->code }}</strong>
                                    </p>
                                    <button onclick="copyToClipboard('{{ $promotion->code }}')" class="btn btn-danger">Sao chép</button>
                                </div>
                            @elseif ($statusCode === 0)
                                <p class="mo-ta">Đã sử dụng vui lòng liên hệ: 0354233642 để biết thêm chi tiết</p>
                                <div class="ma-giam-gia">
                                    <p class="text-danger text-center">
                                        <strong style="margin-right: 5px">{{ $promotion->code }}</strong>
                                    </p>
                                    <button disabled class="btn btn-disabled">Sao chép</button>
                                </div>
                            @elseif ($statusCode === 2)
                                <p class="mo-ta">Đã hết hạn vui lòng liên hệ: 0354233642 để biết thêm chi tiết</p>
                                <div class="ma-giam-gia">
                                    <p class="text-danger text-center">
                                        <strong style="margin-right: 5px">{{ $promotion->code }}</strong>
                                    </p>
                                    <button disabled class="btn btn-disabled">Sao chép</button>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div style="display: flex; justify-content: center; align-items: center; min-height: 300px;">
            <div class="empty-state">
                <img src="https://cdn-icons-png.flaticon.com/512/7486/7486744.png"
                     alt="No promotions"
                     style="width: 100px; opacity: 0.7;">
                <p style="color: #64748b; font-size: 0.95rem; margin-top: 1rem;">
                    Không có mã giảm giá nào
                </p>
            </div>
        </div>
    @endif
    {{ $promotions->links() }}

    <style>
        .empty-state-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 300px;
            width: 100%;
        }

        .empty-state {
            text-align: center;
        }

        .empty-state img {
            margin: 0 auto;
        }

        .empty-state p {
            margin-top: 1rem;
        }

        .btn-disabled {
            background: #94a3b8 !important;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            font-size: 0.875rem;
            font-weight: 500;
            border: none;
            cursor: not-allowed;
            opacity: 0.7;
        }
    </style>

    <script>
        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(() => {
                Livewire.dispatch('showNotification', {
                    message: 'Đã sao chép mã giảm giá',
                    type: 'success'
                });
            }).catch(() => {
                Livewire.dispatch('showNotification', {
                    message: 'Không thể sao chép mã giảm giá',
                    type: 'danger'
                });
            });
        }
    </script>
</div>


