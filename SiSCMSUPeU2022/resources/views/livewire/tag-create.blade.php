<div>
    <x-jet-dialog-modal wire:model="isOpen">
        <x-slot name="title">
            <h3>Registro nuevo tag</h3>
        </x-slot>
        <x-slot name="content">
            <form>
                <input type="hidden" wire:model="tag.id">
                <div class="flex justify-between mx-2 mb-6">
                    <div class="mb-2 md:mr-2 md:mb-0 w-full">
                        <x-jet-label value="Nombre tag" class="font-bold" />
                        <x-jet-input type="text" wire:model="tag.name" class="w-full" />
                        <x-jet-input-error for="tag.name" />
                    </div>
                </div>
                <div class="flex justify-between mx-2 mb-6">
                    <div class="mb-2 md:mr-2 md:mb-0 w-full">
                        <x-jet-label value="Slug del tag" class="font-bold" />
                        <x-jet-input type="text" wire:model.defer="tag.slug" class="w-full" />
                        <x-jet-input-error for="tag.slug" />
                    </div>
                </div>
            </form>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('isOpen',false)" class="mx-2">Cancelar</x-jet-secondary-button>
            <x-jet-button wire:click.prevent="store()" wire:loading.attr="disabled" wire:target="store"
                class="disabled:opacity-25">
                Registrar
            </x-jet-button>
        </x-slot>

    </x-jet-dialog-modal>
</div>
