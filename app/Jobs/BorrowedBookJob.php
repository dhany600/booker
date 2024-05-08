<?php

namespace App\Jobs;

use App\Models\Book;
use App\Models\BorrowedBook;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class BorrowedBookJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $borrowedBook = BorrowedBook::query()
            ->whereDate('returned_at', '<=', now())
            ->where('reading_status', '!=', 'dikembalikan')
            ->get();

        foreach ($borrowedBook as $book) {
            $book->update([
                'reading_status' => 'dikembalikan',
            ]);

            $bookParent = Book::find($book->book_id);
            if ($bookParent) {
                $bookParent->book_left += 1;
                $bookParent->save();
            }
        }
    }
}
