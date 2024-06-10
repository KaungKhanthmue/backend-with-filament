<div>
<form wire:submit="create" >
         <div class="h-[100px]  rounded-xl py-4">
         {{ $this->form }}
         </div>
        <div class="w-full flex justify-end ">
        <button type="submit" class="bg-gray-500 border-2 border-indigo-500 text-white w-[200px] rounded-lg h-[40px]">
            Submit
        </button>
        </div>
    </form>

    <x-filament-actions::modals />
</div>
