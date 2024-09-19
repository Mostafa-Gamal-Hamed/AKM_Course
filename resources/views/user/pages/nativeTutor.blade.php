@extends('user.layout')

@section('Title')
    {{ __('messages.Native tutor') }}
@endsection

<style>
    .header {
        margin-top: 100px;
        font-weight: bold;
    }

    .buyNow {
        transition: 0.5s ease-in-out;
    }

    .buyNow:hover {
        font-size: 19px;
    }

    .showPricing {
        background-color: white;
        transition: 0.5s ease-in-out;
    }

    .showPricing:hover {
        font-size: 20px;
        background-color: rgb(243, 243, 243) !important;
    }
</style>

@section('Body')
    {{-- Header --}}
    <h1 class="header text-center">{{ __('messages.Plans and Pricing') }}</h1>

    {{-- Pricing --}}
    <div id="fh5co-pricing">
        <div class="container">
            <div class="mb-5">
                <p class="text-danger">{{ __('messages.All sessions are private') }}
                    <small>({{ __('messages.one to one') }})</small></p>
                <div class="p-3">
                    <div class="row gap-3 p-3 flexColumn justify-content-between align-items-center">
                        @foreach ($natives as $native)
                            <div class="col-3 shadow border p-3 text-center rounded mb-4 column showPricing">
                                <div>
                                    {{-- Name --}}
                                    <h4 class="fw-bold">{{ __("messages.$native->name") }}</h4>
                                    {{-- Comment --}}
                                    @if ($native->comment != null)
                                        <p class="text-info">{{ __("messages.$native->comment") }}</p>
                                    @endif
                                    {{-- Price & OfferPrice --}}
                                    @if ($native->offerPrice != null)
                                        @if (session()->get('lang') == 'ar')
                                            <h5 class="text-danger"><del>${{ $native->price }}</del></h5>
                                            <h4 class="text-primary">${{ $native->offerPrice }}</h4>
                                        @else
                                            <h5 class="text-danger">$<del>{{ $native->price }}</del></h5>
                                            <h4 class="text-primary">${{ $native->offerPrice }}</h4>
                                        @endif
                                    @else
                                        @if (session()->get('lang') == 'ar')
                                            <h4 class="text-primary">{{ $native->price }}$</h4>
                                        @else
                                            <h4 class="text-primary">${{ $native->price }}</h4>
                                        @endif
                                    @endif
                                    {{-- Month --}}
                                    <h5 class="bg-secondary text-light p-2">{{ $native->month }}/{{ __('messages.month') }}
                                    </h5>
                                    {{-- Type --}}
                                    <p class="p-2" style="background-color: rgb(230 230 230);">
                                        {{ __("messages.$native->type") }}</p>
                                    {{-- Session --}}
                                    <p class="bg-warning text-dark p-2">{{ $native->sessions }}
                                        {{ __('messages.sessions') }}</p>

                                    <a href="{{ url("checkout/$native->id/native") }}"
                                        class="buyNow btn btn-select-plan btn-primary btn-sm">{{ __('messages.Buy now') }}</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
