@extends('client.layouts.payment')
@section('title', 'Nhà tuyển dụng')
@section('content')
    <main class="main">

        <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg p-6">
            <div class="flex justify-between items-center mb-6">
                <a href="http://127.0.0.1:8000/panel/employer/employer/buy-services/buy-services" class="text-blue-600">Quay
                    lại trang gói dịch vụ</a>
            </div>

            <div class="flex space-x-10">
                <div class="w-1/2 bg-gray-100 p-6 rounded">
                    <h2 class="text-lg font-semibold mb-4">Bạn muốn thanh toán như thế nào?</h2>
                    <div class="grid grid-cols-3 gap-4">
                        <img
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRCROhLRjX3VVIFNvry5__GAa8U2CTlQyhYlA&s"
                            alt="Visa" class="rounded rounded-logo payment-method" data-method="Visa">
                        <img
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS5TmYtrb-zQEppk0up4S5LDpCazv20kY7eMQ&s"
                            alt="MasterCard" class="rounded rounded-logo payment-method" data-method="MasterCard">
                        <img
                            src="https://rgb.vn/wp-content/uploads/2014/05/rgb_vn_new_branding_paypal_2014_logo_detail.png"
                            alt="PayPal" class="rounded rounded-logo payment-method" data-method="PayPal">
                        <img
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTp1v7T287-ikP1m7dEUbs2n1SbbLEqkMd1ZA&s"
                            alt="VN pay" class="rounded rounded-logo payment-method" data-method="VN pay">
                        <img src="https://upload.wikimedia.org/wikipedia/vi/f/fe/MoMo_Logo.png" alt="Momo"
                             class="rounded rounded-logo payment-method"
                             data-method="Momo">
                        <img
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQe6SEQ293X0nfFojf6nsCWKA8dNGOrqn21jg&s"
                            alt="Zalo Pay" class="rounded rounded-logo payment-method" data-method="Zalo Pay">
                    </div>
                </div>

                <div class="w-1/2 bg-gray-100 p-6 rounded">
                    <h2 class="text-lg font-semibold mb-4">Tóm tắt đơn hàng</h2>
                    <ul class="mt-4 mb-6">
                        <li class="flex justify-between text-sm mb-2">
                            <span>{{ $package->title }}</span>
                            <span>{{ number_format($package->price) }} VNĐ</span>
                        </li>
                        <li class="flex justify-end text-sm mb-2">
                            <span class="text-blue-500 text-sm">
                                <a href="javascript:void(0);" id="openModal">Nhập hoặc chọn mã giảm giá</a>
                            </span>
                        </li>
                    </ul>
                    <div class="flex justify-between font-semibold text-lg mb-6 total-price"
                         data-price="{{ $package->price }}">
                        <span>Tổng cộng</span>
                        <span>
                            {{ number_format($package->price) }} VNĐ
                        </span>
                    </div>

                    <form id="payment-form" action="{{ route('client.employer.payment.process') }}" method="POST">
                        @csrf
                        <input type="hidden" name="package_id" value="{{ $package->id }}">
                        <input type="hidden" name="promo_code" id="promoCodeInput">
                        <input type="hidden" id="redirectInput">
                        <input type="hidden" name="final_price" id="finalPriceInput">
                        <input type="hidden" id="discountInput" name="discount" value="0">
                        <input type="hidden" name="payment_method" id="selectedPaymentMethod">
                        <button class="w-full bg-green-600 text-white py-3 rounded mb-4 continue-payment">Tiếp tục thanh
                            toán
                        </button>
                    </form>
                    <button type="button" class="continue-payment w-full bg-gray-300 text-gray-700 py-3 rounded">Hủy
                        thanh toán
                    </button>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div id="promoModal"
             class="fixed inset-0 bg-gray-800 bg-opacity-75 hidden z-50 flex items-center justify-center">
            <div id="modalContent" class="bg-white rounded-lg shadow-lg w-full max-w-lg">
                <div class="px-4 py-3 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-700">Chọn mã giảm giá</h3>
                    <button id="closeModal" class="text-gray-400 hover:text-gray-600 float-right">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                             xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <div class="p-4">
                    <div class="mb-4">
                        <input type="text" id="promoCodeTextInput" class="border rounded w-full p-2"
                               placeholder="Nhập mã giảm giá"
                               aria-label="Promo Code">
                    </div>
                    @if($availablePromotions->isEmpty())
                        <p>Không có mã giảm giá nào khả dụng.</p>
                    @else
                        <div class="voucher-list overflow-y-auto" style="max-height: 300px;">
                            @foreach($availablePromotions as $promotion)
                                <div class="d-flex justify-content-center">
                                    <p class="text-lg font-bold">{{ $promotion->describe }}</p>
                                </div>
                                <div class="flex items-center justify-between mb-4">
                                    <div>
                                        <div>
                                            <strong>{{ $promotion->code }}</strong> -
                                            Giảm {{ number_format($promotion->discount) }} VNĐ
                                        </div>
                                        <div>
                                            <span>HSD: {{ \Carbon\Carbon::parse($promotion['created_at'])->diffForHumans() }} </span>
                                        </div>
                                    </div>
                                    <input type="radio" name="promo" value="{{ $promotion->code }}"
                                           data-discount="{{ $promotion->discount }}" class="h-5 w-5 text-blue-500"/>
                                </div>
                                <hr class="mb-4">
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="px-4 py-3 border-t border-gray-200 flex justify-end space-x-3">
                    <button id="closeModalFooter" class="bg-gray-300 text-gray-600 py-2 px-4 rounded">Trở lại</button>
                    <button id="applyPromoCode" class="bg-blue-500 text-white py-2 px-4 rounded">Áp dụng</button>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('script')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const promoModal = document.getElementById('promoModal');
            const modalContent = document.getElementById('modalContent');
            const promoCodeTextInput = document.getElementById('promoCodeTextInput');
            const applyPromoCodeButton = document.getElementById('applyPromoCode');
            const closeModalButtons = document.querySelectorAll('#closeModal, #closeModalFooter');
            const paymentOptions = document.querySelectorAll('.rounded-logo');
            let selectedPaymentMethod = '';
            const paymentMethodInput = document.getElementById('selectedPaymentMethod');
            const redirectInput = document.getElementById('redirectInput');
            let discount = 0;

            paymentOptions.forEach((option) => {
                option.addEventListener('click', function () {
                    paymentOptions.forEach(img => img.style.border = '');
                    this.style.border = '2px solid blue';
                    selectedPaymentMethod = this.alt;
                    paymentMethodInput.value = selectedPaymentMethod;

                    if (selectedPaymentMethod === 'VN pay') {
                        redirectInput.setAttribute('name', 'redirect');
                    } else if (selectedPaymentMethod === 'Momo') {
                        redirectInput.setAttribute('name', 'payUrl');
                    } else {
                        redirectInput.removeAttribute('name');
                    }
                });
            });

            const paymentButton = document.querySelector('.continue-payment');
            paymentButton.addEventListener('click', function (event) {
                const finalPriceInput = document.querySelector('input[name="final_price"]');
                const finalPromoInput = document.querySelector('input[name="promo_code"]');

                if (selectedPaymentMethod) {
                    document.getElementById('payment-form').submit();
                } else {
                    alert('Vui lòng chọn phương thức thanh toán');
                    event.preventDefault();
                }
            });

            document.getElementById('openModal').addEventListener('click', function () {
                promoModal.classList.remove('hidden');
            });

            closeModalButtons.forEach(button => {
                button.addEventListener('click', function () {
                    promoModal.classList.add('hidden');
                });
            });

            promoModal.addEventListener('click', function (event) {
                if (!modalContent.contains(event.target)) {
                    promoModal.classList.add('hidden');
                }
            });

            applyPromoCodeButton.addEventListener('click', function () {
                const promoCode = promoCodeTextInput.value.trim();
                let promoFound = false;

                if (promoCode) {
                    const promos = document.querySelectorAll('input[name="promo"]');
                    promos.forEach((promo) => {
                        if (promo.value === promoCode) {
                            discount = parseFloat(promo.dataset.discount);
                            promoFound = true;
                            document.getElementById('promoCodeInput').value = promoCode;
                        }
                    });

                    if (!promoFound) {
                        alert('Mã giảm giá không hợp lệ.');
                        discount = 0;
                    }
                } else {
                    const selectedPromo = document.querySelector('input[name="promo"]:checked');
                    if (selectedPromo) {
                        discount = parseFloat(selectedPromo.dataset.discount);
                        document.getElementById('promoCodeInput').value = selectedPromo.value;
                    } else {
                        discount = 0;
                    }
                }

                updateTotalPrice(discount);
                promoModal.classList.add('hidden');
            });

            function updateTotalPrice(discount) {
                const totalPriceElement = document.querySelector('.total-price');
                const packagePrice = parseFloat(totalPriceElement.dataset.price);
                const finalPrice = packagePrice - discount;
                totalPriceElement.querySelector('span:last-child').textContent = `${finalPrice.toLocaleString()} VNĐ`;
                document.getElementById('finalPriceInput').value = finalPrice;
                document.getElementById('discountInput').value = discount;
            }
        });
    </script>
@endpush
