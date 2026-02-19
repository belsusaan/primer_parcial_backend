<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function store(StoreLoanRequest $request): JsonResponse
    {
        $book = Book::findOrFail($request->book_id);

        if ($book->available_copies <= 0) {
            return response()->json([
                'message' => 'No hay copias disponibles para este libro.',
            ], 422);
        }

        $loan = Loan::create([
            'book_id' => $book->id,
            'applicant_name' => $request->applicant_name,
            'loan_date' => now(),
        ]);

        $book->available_copies -= 1;
        if ($book->available_copies === 0) {
            $book->status = false;
        }
        $book->save();

        return response()->json([
            'message' => 'Préstamo registrado exitosamente',
            'loan' => $loan,
        ], 201);
    }

    public function return(int $loanId): JsonResponse
    {
        $loan = Loan::with('book')->findOrFail($loanId);

        if ($loan->return_date !== null) {
            return response()->json([
                'message' => 'Este préstamo ya fue devuelto',
            ], 422);
        }

        $loan->return_date = now();
        $loan->save();

        $book = $loan->book;
        $book->available_copies += 1;
        if (!$book->status) {
            $book->status = true;
        }
        $book->save();

        return response()->json([
            'message' => 'Devolución registrada exitosamente.',
            'loan' => $loan,
        ], 200);
    }

    public function history(): JsonResponse
    {
        $loans = Loan::with('book')->get()->map(function ($loan) {
            return [
                'id' => $loan->id,
                'applicant_name' => $loan->applicant_name,
                'loan_date' => $loan->loan_date,
                'return_date' => $loan->return_date,
                'status' => $loan->return_date ? 'Devuelto' : 'Activo',
                'book' => [
                    'id' => $loan->book->id,
                    'title' => $loan->book->title,
                    'isbn' => $loan->book->isbn,
                ],
            ];
        });

        return response()->json(['data' => $loans], 200);
    }
}
