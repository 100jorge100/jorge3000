<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            {{-- <x-authentication-card-logo /> --}}
            <p class="mt-8 text-2xl text-center font-medium text-bg-black">SISTEMA DE MONITOREO PARA EL PROCESO DE CONTROL DE PROYECTOS VIA WEB</p>
            <p class="mt-2 text-xl text-center font-medium text-bg-black">GOBIERNO AUTONOMO MUNICIPAL DE BATALLAS</p>
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>
            <!-- -->
            <div>
                <x-label for="nombre" value="{{ __('Nombre') }}" />
                <x-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required autofocus autocomplete="nombre" />
            </div>
            <div>
                <x-label for="apellido_paterno" value="{{ __('Apellido Paterno') }}" />
                <x-input id="apellido_paterno" class="block mt-1 w-full" type="text" name="apellido_paterno" :value="old('apellido_paterno')" required autofocus autocomplete="apellido_paterno" />
            </div>
            <div>
                <x-label for="apellido_materno" value="{{ __('Apellido Materno') }}" />
                <x-input id="apellido_materno" class="block mt-1 w-full" type="text" name="apellido_materno" :value="old('apellido_materno')" required autofocus autocomplete="apellido_materno" />
            </div>
            <div>
                <x-label for="fecha_nacimiento" value="{{ __('Fecha_nacimiento') }}" />
                <x-input id="fecha_nacimiento" class="block mt-1 w-full" type="text" name="fecha_nacimiento" :value="old('fecha_nacimiento')" required autofocus autocomplete="fecha_nacimiento" />
            </div>
            <div>
                <x-label for="telefono" value="{{ __('Telefono') }}" />
                <x-input id="telefono" class="block mt-1 w-full" type="text" name="telefono" :value="old('telefono')" required autofocus autocomplete="telefono" />
            </div>
            <div>
                <x-label for="direccion" value="{{ __('Direccion') }}" />
                <x-input id="direccion" class="block mt-1 w-full" type="text" name="direccion" :value="old('direccion')" required autofocus autocomplete="direccion" />
            </div>
            <div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="sexo">Sexo</label>
                        <div class="form-check">
                            <input type="radio" class="form-check-input @error('sexo') is-invalid @enderror"
                            name="sexo" id="sexoM" value="M" {{ old( 'sexo' ) == 'M' ? 'checked' : '' }}>
                            <label for="sexoM" class="form-check-label">Masculino</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input @error('sexo') is-invalid @enderror"
                            name="sexo" id="sexoF" value="F" {{ old( 'sexo' ) == 'F' ? 'checked' : '' }}>
                            <label for="sexoF" class="form-check-label">Femenino</label>
                            @error('sexo')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
