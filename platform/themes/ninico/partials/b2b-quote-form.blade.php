<div class="b2b-quote-wrapper p-relative mb-50">
    <div class="b2b-quote-card bg-white p-4 p-md-5 rounded-3 shadow-sm border">
        <div class="b2b-quote-header mb-30 text-center text-md-start">
            <h3 class="b2b-quote-title fw-bold mb-10 text-dark">
                {{ __('Direct Rice Mill Bulk Quote Request') }}
            </h3>
            <p class="text-muted mb-0">
                {{ __('Fill in your wholesale specifications below. Our mill-direct trade desk calculates freight & mill-gate rates and provides guaranteed pricing within 24 hours.') }}
            </p>
        </div>

        @if (session('success_msg'))
            <div class="alert alert-success alert-dismissible fade show mb-25" role="alert">
                <i class="fal fa-check-circle me-2"></i> {{ session('success_msg') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="b2b-alert-container mb-25" style="display: none;"></div>

        <form action="{{ route('b2b.quote.submit') }}" method="POST" class="b2b-quote-form" id="b2bQuoteForm">
            @csrf

            <div class="row g-3">
                {{-- Row 1: Contact Name | Company / Business Name --}}
                <div class="col-md-6">
                    <div class="form-group mb-20">
                        <label for="b2b_name" class="form-label fw-semibold text-dark">
                            {{ __('Contact Person / Full Name') }} <span class="text-danger">*</span>
                        </label>
                        <input type="text" name="name" id="b2b_name" class="form-control form-control-lg fs-6 b2b-input" placeholder="{{ __('e.g. Ramesh Sharma') }}" value="{{ old('name') }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-20">
                        <label for="b2b_company_name" class="form-label fw-semibold text-dark">
                            {{ __('Company / Business Name') }} <span class="text-danger">*</span>
                        </label>
                        <input type="text" name="company_name" id="b2b_company_name" class="form-control form-control-lg fs-6 b2b-input" placeholder="{{ __('e.g. Sri Balaji Traders / Supermarket') }}" value="{{ old('company_name') }}" required>
                    </div>
                </div>

                {{-- Row 2: Phone Number | Email Address --}}
                <div class="col-md-6">
                    <div class="form-group mb-20">
                        <label for="b2b_phone" class="form-label fw-semibold text-dark">
                            {{ __('Phone Number (WhatsApp Preferred)') }} <span class="text-danger">*</span>
                        </label>
                        <input type="tel" name="phone" id="b2b_phone" class="form-control form-control-lg fs-6 b2b-input" placeholder="{{ __('e.g. +91 98765 43210') }}" value="{{ old('phone') }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-20">
                        <label for="b2b_email" class="form-label fw-semibold text-dark">
                            {{ __('Business Email Address') }} <span class="text-danger">*</span>
                        </label>
                        <input type="email" name="email" id="b2b_email" class="form-control form-control-lg fs-6 b2b-input" placeholder="{{ __('e.g. orders@company.com') }}" value="{{ old('email') }}" required>
                    </div>
                </div>

                {{-- Row 3: GSTIN (Optional) | Rice Variety --}}
                <div class="col-md-6">
                    <div class="form-group mb-20">
                        <label for="b2b_gstin" class="form-label fw-semibold text-dark">
                            {{ __('GSTIN (Optional)') }}
                        </label>
                        <input type="text" name="gstin" id="b2b_gstin" class="form-control form-control-lg fs-6 b2b-input text-uppercase" placeholder="{{ __('e.g. 36AAAAA0000A1Z5') }}" value="{{ old('gstin') }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-20">
                        <label for="b2b_rice_variety" class="form-label fw-semibold text-dark">
                            {{ __('Rice Variety') }} <span class="text-danger">*</span>
                        </label>
                        <select name="rice_variety" id="b2b_rice_variety" class="form-select form-select-lg fs-6 b2b-select" required>
                            <option value="">{{ __('-- Select Rice Variety --') }}</option>
                            <option value="Sona Masoori Raw" {{ old('rice_variety') == 'Sona Masoori Raw' ? 'selected' : '' }}>{{ __('Sona Masoori Raw') }}</option>
                            <option value="Sona Masoori Steam" {{ old('rice_variety') == 'Sona Masoori Steam' ? 'selected' : '' }}>{{ __('Sona Masoori Steam') }}</option>
                            <option value="BPT 5204" {{ old('rice_variety') == 'BPT 5204' ? 'selected' : '' }}>{{ __('BPT 5204') }}</option>
                            <option value="Basmati" {{ old('rice_variety') == 'Basmati' ? 'selected' : '' }}>{{ __('Basmati') }}</option>
                            <option value="Broken Rice" {{ old('rice_variety') == 'Broken Rice' ? 'selected' : '' }}>{{ __('Broken Rice') }}</option>
                            <option value="Custom / Other" {{ old('rice_variety') == 'Custom / Other' ? 'selected' : '' }}>{{ __('Custom / Other') }}</option>
                        </select>
                    </div>
                </div>

                {{-- Row 4: Quantity Required | Packaging Preference --}}
                <div class="col-md-6">
                    <div class="form-group mb-20">
                        <label for="b2b_quantity" class="form-label fw-semibold text-dark">
                            {{ __('Quantity Required') }} <span class="text-danger">*</span>
                        </label>
                        <select name="quantity" id="b2b_quantity" class="form-select form-select-lg fs-6 b2b-select" required>
                            <option value="">{{ __('-- Select Quantity Range --') }}</option>
                            <option value="25-50 Bags (1-2 MT)" {{ old('quantity') == '25-50 Bags (1-2 MT)' ? 'selected' : '' }}>{{ __('25-50 Bags (1-2 MT)') }}</option>
                            <option value="5-10 Quintals" {{ old('quantity') == '5-10 Quintals' ? 'selected' : '' }}>{{ __('5-10 Quintals') }}</option>
                            <option value="10-25 Quintals" {{ old('quantity') == '10-25 Quintals' ? 'selected' : '' }}>{{ __('10-25 Quintals') }}</option>
                            <option value="Full Truckload / 20+ MT" {{ old('quantity') == 'Full Truckload / 20+ MT' ? 'selected' : '' }}>{{ __('Full Truckload / 20+ MT') }}</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-20">
                        <label for="b2b_packaging_type" class="form-label fw-semibold text-dark">
                            {{ __('Packaging Preference') }} <span class="text-danger">*</span>
                        </label>
                        <select name="packaging_type" id="b2b_packaging_type" class="form-select form-select-lg fs-6 b2b-select" required>
                            <option value="">{{ __('-- Select Packaging --') }}</option>
                            <option value="25kg Bags" {{ old('packaging_type') == '25kg Bags' ? 'selected' : '' }}>{{ __('25kg Bags') }}</option>
                            <option value="50kg Bags" {{ old('packaging_type') == '50kg Bags' ? 'selected' : '' }}>{{ __('50kg Bags') }}</option>
                            <option value="Custom Branded Bags" {{ old('packaging_type') == 'Custom Branded Bags' ? 'selected' : '' }}>{{ __('Custom Branded Bags') }}</option>
                        </select>
                    </div>
                </div>

                {{-- Row 5: Delivery Pincode | Destination City / State --}}
                <div class="col-md-6">
                    <div class="form-group mb-20">
                        <label for="b2b_delivery_pincode" class="form-label fw-semibold text-dark">
                            {{ __('Delivery Pincode') }} <span class="text-danger">*</span>
                        </label>
                        <input type="text" name="delivery_pincode" id="b2b_delivery_pincode" class="form-control form-control-lg fs-6 b2b-input" placeholder="{{ __('e.g. 500001') }}" value="{{ old('delivery_pincode') }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-20">
                        <label for="b2b_delivery_city" class="form-label fw-semibold text-dark">
                            {{ __('Destination City / State') }} <span class="text-danger">*</span>
                        </label>
                        <input type="text" name="delivery_city" id="b2b_delivery_city" class="form-control form-control-lg fs-6 b2b-input" placeholder="{{ __('e.g. Hyderabad, Telangana') }}" value="{{ old('delivery_city') }}" required>
                    </div>
                </div>

                {{-- Row 6: Additional Specifications / Delivery Terms --}}
                <div class="col-12">
                    <div class="form-group mb-25">
                        <label for="b2b_notes" class="form-label fw-semibold text-dark">
                            {{ __('Additional Specifications / Delivery Terms') }}
                        </label>
                        <textarea name="notes" id="b2b_notes" rows="4" class="form-control fs-6 b2b-textarea" placeholder="{{ __('Specify target delivery date, quality standards (sortex, moisture), unloading requirements, or sample requests...') }}">{{ old('notes') }}</textarea>
                    </div>
                </div>

                {{-- Submit Button --}}
                <div class="col-12 text-center text-md-start">
                    <button type="submit" class="tp-btn tp-color-btn tp-wish-cart px-4 py-3 fw-bold fs-6 b2b-submit-btn" id="b2bSubmitBtn">
                        <span class="btn-text">{{ __('Request Direct Mill-Gate Quote') }}</span>
                        <span class="spinner-border spinner-border-sm d-none ms-2" role="status" aria-hidden="true"></span>
                        <i class="fal fa-arrow-right ms-2 btn-icon"></i>
                    </button>
                    <span class="d-block d-md-inline-block ms-md-3 mt-2 mt-md-0 text-muted small">
                        <i class="fal fa-shield-check text-success me-1"></i> {{ __('No middlemen. 100% Genuine Mill Pricing.') }}
                    </span>
                </div>
            </div>
        </form>
    </div>
</div>

<style>
    .b2b-quote-wrapper .b2b-quote-card {
        background: #ffffff;
        border-radius: 12px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.05);
        border: 1px solid #eaeaea;
    }
    .b2b-quote-wrapper .b2b-input,
    .b2b-quote-wrapper .b2b-select,
    .b2b-quote-wrapper .b2b-textarea {
        background-color: #fbfbfb;
        border: 1px solid #e2e5e8;
        border-radius: 8px;
        padding: 12px 16px;
        transition: all 0.2s ease-in-out;
    }
    .b2b-quote-wrapper .b2b-input:focus,
    .b2b-quote-wrapper .b2b-select:focus,
    .b2b-quote-wrapper .b2b-textarea:focus {
        background-color: #ffffff;
        border-color: var(--tp-text-primary, #d51243);
        box-shadow: 0 0 0 3px rgba(213, 18, 67, 0.12);
    }
    .b2b-quote-wrapper .b2b-submit-btn {
        background-color: var(--tp-text-primary, #d51243);
        color: #fff;
        border: none;
        border-radius: 8px;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }
    .b2b-quote-wrapper .b2b-submit-btn:hover {
        background-color: #b00d35;
        color: #fff;
    }
    .b2b-quote-wrapper .form-label {
        font-size: 14px;
        margin-bottom: 6px;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('b2bQuoteForm');
        if (!form) return;

        const submitBtn = document.getElementById('b2bSubmitBtn');
        const spinner = submitBtn.querySelector('.spinner-border');
        const icon = submitBtn.querySelector('.btn-icon');
        const alertBox = document.querySelector('.b2b-alert-container');

        form.addEventListener('submit', function (e) {
            e.preventDefault();

            // Set loading state
            submitBtn.disabled = true;
            spinner.classList.remove('d-none');
            if (icon) icon.classList.add('d-none');
            alertBox.style.display = 'none';
            alertBox.innerHTML = '';

            const formData = new FormData(form);

            fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                }
            })
            .then(async (response) => {
                const data = await response.json();
                if (!response.ok) {
                    throw data;
                }
                return data;
            })
            .then((data) => {
                alertBox.className = 'b2b-alert-container alert alert-success alert-dismissible fade show mb-25';
                alertBox.innerHTML = '<i class="fal fa-check-circle me-2"></i>' + (data.message || '{{ __("Your quote request has been sent successfully!") }}') + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                alertBox.style.display = 'block';
                form.reset();
                form.scrollIntoView({ behavior: 'smooth', block: 'start' });
            })
            .catch((error) => {
                let errorHtml = '<i class="fal fa-exclamation-triangle me-2"></i>';
                if (error && error.errors) {
                    const errorList = Object.values(error.errors).flat().join('<br>');
                    errorHtml += errorList;
                } else if (error && error.message) {
                    errorHtml += error.message;
                } else {
                    errorHtml += '{{ __("An error occurred while submitting your request. Please try again.") }}';
                }
                alertBox.className = 'b2b-alert-container alert alert-danger alert-dismissible fade show mb-25';
                alertBox.innerHTML = errorHtml + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                alertBox.style.display = 'block';
                form.scrollIntoView({ behavior: 'smooth', block: 'start' });
            })
            .finally(() => {
                submitBtn.disabled = false;
                spinner.classList.add('d-none');
                if (icon) icon.classList.remove('d-none');
            });
        });
    });
</script>
