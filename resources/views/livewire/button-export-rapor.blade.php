<div wire:ignore.self class="mb-4">
    <form class="form form-vertical" wire:submit.prevent="export">
        <button type="submit"
        @if ($nilai != $mapel)
            class="btn disabled btn-sm btn-primary"
        @else 
            class="btn btn-sm btn-primary"
        @endif class="btn btn-sm btn-primary" wire.click="export()">
            <i class="bi bi-printer"></i> &nbspCetak Rapor
        </button>
    </form>
</div>