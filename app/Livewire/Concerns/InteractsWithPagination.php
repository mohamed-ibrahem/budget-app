<?php

namespace App\Livewire\Concerns;

use Livewire\Attributes\Locked;

trait InteractsWithPagination
{
    #[Locked]
    public array $chunks = [];

    public int $page = 1;

    public function bootInteractsWithPagination(): void
    {
        $this->chunks = $this->createPaginationChunk();
    }

    public function hasMorePages(): bool
    {
        return $this->page < count($this->chunks);
    }

    public function loadMore(): void
    {
        if (!$this->hasMorePages()) {
            return;
        }

        $this->page = $this->page + 1;
    }

    public function createPaginationChunk(): array
    {
        return [];
    }
}
