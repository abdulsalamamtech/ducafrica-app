



Option 2: Fast-Excel
This is a lighter alternative, especially good for shared hosting:

1. Install via Composer:
// https://github.com/rap2hpoutre/fast-excel
```bash
composer require rap2hpoutre/fast-excel

```
2. Export Example:

```php
use FastExcel;

class ExportController extends Controller
{
    public function export()
    {
        $users = User::all();
        
        return FastExcel::data($users)->download('users.xlsx');
    }
    
    // Or with data formatting
    public function exportFormatted()
    {
        $users = User::all();
        
        return (new FastExcel($users))->download('users.xlsx', function ($user) {
            return [
                'Name' => $user->name,
                'Email' => $user->email,
                'Registered' => $user->created_at->format('Y-m-d')
            ];
        });
    }
}

```


3. Import Example:

```php
public function import(Request $request)
{
    $users = (new FastExcel)->import($request->file('excel_file'), function ($line) {
        return User::create([
            'name' => $line['Name'],
            'email' => $line['Email'],
        ]);
    });
    
    return back()->with('success', 'Users imported successfully!');
}


```


Important Tips for Shared Hosting:
Memory Management:

// Add at the top of large export methods
```bash
ini_set('memory_limit', '256M');
Chunk Large Datasets:
```

// For PhpSpreadsheet
```php
    User::chunk(1000, function($users) use (&$sheet, &$row) {
        foreach($users as $user) {
            $sheet->setCellValue('A' . $row, $user->name);
            $sheet->setCellValue('B' . $row, $user->email);
            $row++;
        }
    });

    // For Fast-Excel (built-in chunking)
    return (new FastExcel(User::cursor()))->download('users.xlsx');

```



3. Add Route for Export:

// routes/web.php
```php
    Route::get('/export', [ExportController::class, 'export'])->name('export');
    Route::post('/import', [ExportController::class, 'import'])->name('import');

```


4. Basic Form for Import:

```php
    <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="excel_file">
        <button type="submit">Import</button>
    </form>

```
