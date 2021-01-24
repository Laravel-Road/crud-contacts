<div>
    <x-jet-section-border/>

    <x-jet-form-section submit="store">
        <x-slot name="title">{{ __('Create Contact') }}</x-slot>

        <x-slot name="description">{{ __('Create a new contact. All fields are mandatory.') }}</x-slot>

        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="newContact.name" value="{{ __('Name') }}"/>
                <x-jet-input id="newContact.name"
                             type="text"
                             class="mt-1 block w-full"
                             wire:model.defer="newContact.name"
                             autofocus/>
                <x-jet-input-error for="newContact.name" class="mt-2"/>
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="newContact.email" value="{{ __('E-mail') }}"/>
                <x-jet-input id="newContact.email"
                             type="text"
                             class="mt-1 block w-full"
                             wire:model.defer="newContact.email"
                             autofocus/>
                <x-jet-input-error for="newContact.email" class="mt-2"/>
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="newContact.phone" value="{{ __('Phone') }}"/>
                <x-jet-input id="newContact.phone"
                             type="text"
                             class="mt-1 block w-full"
                             wire:model.defer="newContact.phone"
                             autofocus/>
                <x-jet-input-error for="newContact.phone" class="mt-2"/>
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="newContact.message" value="{{ __('Message') }}"/>
                <textarea id="newContact.message"
                          class="mt-1 block w-full"
                          wire:model.defer="newContact.message"
                          autofocus>
                </textarea>
                <x-jet-input-error for="newContact.message" class="mt-2"/>
            </div>
        </x-slot>

        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="created">
                {{ __('Contact created.') }}
            </x-jet-action-message>

            <x-jet-button>{{ __('Save') }}</x-jet-button>
        </x-slot>
    </x-jet-form-section>
</div>
