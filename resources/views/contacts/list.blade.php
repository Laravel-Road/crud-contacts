<div>
    @if ($this->list->isNotEmpty())
        <x-jet-section-border/>

        <div class="mt-10 sm:mt-0">
            <x-jet-action-section>
                <x-slot name="title">{{ __('Contacts') }}</x-slot>

                <x-slot name="description">{{ __('List contacts.') }}</x-slot>

                <x-slot name="content">
                    <div class="space-y-6">
                        @foreach ($this->list as $item)
                            <div class="flex items-start justify-between">
                                <div class="w-64">{{ $item->name }}</div>
                                <div class="w-64">{{ $item->email }}</div>

                                <div>
                                    @livewire('contacts.contact-item', ['contact' => $item], key($item->id))
                                </div>
                            </div>
                        @endforeach
                        {{ $this->list->links() }}
                    </div>
                </x-slot>
            </x-jet-action-section>
        </div>
    @endif
</div>
