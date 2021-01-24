<div>
    <button
        class="cursor-pointer ml-6 text-sm text-gray-400 underline focus:outline-none hover:text-teal-700"
        wire:click="edit({{ $contact }})">
        {{ __('Edit') }}
    </button>

    <button class="cursor-pointer ml-6 text-sm text-red-500 focus:outline-none"
            wire:click="confirmDeletion({{ $contact }})">
        {{ __('Delete') }}
    </button>

    <x-jet-dialog-modal wire:model="updating">
        <x-slot name="title">{{ __('Update Contact') }}</x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="contact.name" value="{{ __('Name') }}"/>
                    <x-jet-input type="text"
                                 class="mt-1 block w-full"
                                 wire:model.defer="contact.name"
                                 autofocus/>
                    <x-jet-input-error for="contact.name" class="mt-2"/>
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="contact.email" value="{{ __('E-mail') }}"/>
                    <x-jet-input type="text"
                                 class="mt-1 block w-full"
                                 wire:model.defer="contact.email"
                                 autofocus/>
                    <x-jet-input-error for="contact.email" class="mt-2"/>
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="contact.phone" value="{{ __('Phone') }}"/>
                    <x-jet-input type="text"
                                 class="mt-1 block w-full"
                                 wire:model.defer="contact.phone"
                                 autofocus/>
                    <x-jet-input-error for="contact.phone" class="mt-2"/>
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="contact.message" value="{{ __('Message') }}"/>
                    <textarea class="mt-1 block w-full"
                              wire:model.defer="contact.message"
                              autofocus>
                    </textarea>
                    <x-jet-input-error for="contact.message" class="mt-2"/>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('updating')" wire:loading.attr="disabled">
                {{ __('Nevermind') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2" wire:click="update" wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>

    <x-jet-confirmation-modal wire:model="destroying">
        <x-slot name="title">{{ __('Delete Contact') }}</x-slot>

        <x-slot name="content">{{ __('Are you sure about it?') }}</x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('destroying')" wire:loading.attr="disabled">
                {{ __('Nevermind') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="destroy" wire:loading.attr="disabled">
                {{ __('Delete Contact') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>
</div>
