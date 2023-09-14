@extends('public.components.layout')

@section('content')

    <div class="my-12">
        <div class="text-5xl justify-center text-center">
            <h1>Contact Us</h1>
        </div>
        <div class="justify-center text-center">
            <div class="mx-8 font-light">
                <p class="my-6">Please fill out the form below if you have any question or concern</p>
            </div>
            {{-- form --}}
            <div
                class="inline-flex items-baseline max-w-md rounded-lg bg-white p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)]">
                <form id="inquiry-form" data-te-validation-init data-te-validated="false" method="POST" action="{{ route('send-inquiry') }}">
                    @csrf
                    <div class="grid grid-cols-2 gap-4">
                        <!--First name input-->
                        <div class="relative mb-6" data-te-input-wrapper-init id="input-firstname" data-te-validate="input"
                            data-te-validation-ruleset="isRequired">
                            <input type="text"
                                class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                name="first_name" id="firstname" aria-describedby="firstname" placeholder="First name" />
                            <label for="firstname"
                                class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none">First
                                name
                            </label>
                        </div>

                        <!--Last name input-->
                        <div class="relative mb-6" data-te-input-wrapper-init id="input-lastname" data-te-validate="input"
                            data-te-validation-ruleset="isRequired">
                            <input type="text"
                                class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                name="last_name" id="lastname" aria-describedby="lastname" placeholder="Last name" />
                            <label for="lastname"
                                class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none">Last
                                name
                            </label>
                        </div>
                    </div>

                    <!--Email input-->
                    <div class="relative mb-6" data-te-input-wrapper-init id="input-email" data-te-validate="input"
                        data-te-validation-ruleset="isRequired|isEmail">
                        <input type="email"
                            class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                            name="email" id="email" placeholder="Email address" autocomplete="off" />
                        <label for="email"
                            class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none">Email
                            address
                        </label>
                    </div>

                    <!--Phone input-->
                    <div class="relative mb-6" data-te-input-wrapper-init id="input-phone" data-te-validate="input"
                        data-te-validation-ruleset="isRequired|isNumber|isLongerThan(8)|isShorterThan(14)">
                        <input type="phone"
                            class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                            name="phone" id="phone" placeholder="Phone" autocomplete="off" />
                        <label for="phone"
                            class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none">Phone
                            Number
                        </label>
                    </div>

                    {{-- Message --}}
                    <div class="relative mb-3" data-te-input-wrapper-init id="input-firstname" data-te-validate="input"
                        data-te-validation-ruleset="isRequired">
                        <textarea
                            class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                            name="message" id="message" rows="3" placeholder="Your message"></textarea>
                        <label for="message"
                            class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none">Message</label>
                    </div>

                    <!--Submit button-->
                    <button type="submit"
                        id="submit" class="inline-block w-full rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]"
                        data-te-ripple-init data-te-ripple-color="light" data-te-submit-btn-ref>
                        Submit
                    </button>
                </form>



            </div>
        </div>


    </div>

@stop
