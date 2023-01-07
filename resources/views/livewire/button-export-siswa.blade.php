<div wire:ignore.self>
    <form class="form form-vertical" wire:submit.prevent="export">
        <button type="submit" class="btn btn-sm btn-primary" wire.click="export()">
            <i class="bi bi-printer"></i> &nbspPDF
        </button>
    </form>
</div>
