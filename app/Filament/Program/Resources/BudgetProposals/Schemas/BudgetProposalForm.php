<?php

// namespace App\Filament\Program\Resources\BudgetProposals\Schemas;

// use Filament\Facades\Filament;
// use Filament\Forms\Components\{Wizard, Wizard\Step};
// use Filament\Forms\Components\{Select, TextInput, Textarea, DateTimePicker, Repeater};
// use Filament\Schemas\Components\Wizard as ComponentsWizard;
// use Filament\Schemas\Components\Wizard\Step as WizardStep;
// use Illuminate\Support\Number;
// use Filament\Schemas\Schema;

// class BudgetProposalForm
// {
//     public static function configure(Schema $schema): Schema
//     {
//         return $schema->components([
//             ComponentsWizard::make([

//                 /* ==========================================================
//                  * PAGE 1 — Informasi Dasar
//                  * ========================================================== */
//                 WizardStep::make('Informasi Dasar')
//                     ->schema([
//                         Select::make('program_id')
//                             ->label('Program')
//                             ->relationship('program', 'name')
//                             ->default(fn () => Filament::getTenant()?->id)
//                             ->disabled()
//                             ->dehydrated(),

//                         Select::make('activity_plan_id')
//                             ->relationship('activityPlan', 'name')
//                             ->getOptionLabelFromRecordUsing(fn ($record) =>
//                                 '<strong>' . $record->activity_code . '</strong> : ' . $record->name
//                             )
//                             ->searchable()
//                             ->allowHtml()
//                             ->preload()
//                             ->required(),

//                         TextInput::make('proposal_number')
//                             ->label('Nomor Proposal')
//                             ->required(),
//                     ]),

//                 /* ==========================================================
//                  * PAGE 2 — Rincian Anggaran
//                  * ========================================================== */
//                 WizardStep::make('Rincian Anggaran')
//                     ->schema([

//                         /* ------------------------ ITEMS ------------------------ */
//                         Repeater::make('items')
//                             ->label('Rincian Anggaran')
//                             ->schema([
//                                 TextInput::make('item_name')
//                                     ->label('Nama Item')
//                                     ->required(),

//                                 TextInput::make('qty')
//                                     ->label('Qty')
//                                     ->default(1)
//                                     ->numeric()
//                                     ->reactive()
//                                     ->afterStateUpdated(function ($state, callable $set, $get) {
//                                         // recalc when qty changed
//                                         self::recalculateItem($set, $get);
//                                     }),

//                                 /* Harga satuan dengan formatting rupiah */
//                                 TextInput::make('unit_price')
//                                     ->label('Harga Satuan')
//                                     ->numeric()
//                                     ->reactive()
//                                     ->formatStateUsing(fn ($state) =>
//                                         Number::format((float) preg_replace('/[^\d]/', '', $state ?? 0), locale: 'id')
//                                     )
//                                     ->dehydrateStateUsing(fn ($state) =>
//                                         (float) preg_replace('/[^\d]/', '', $state ?? 0)
//                                     )
//                                     ->afterStateUpdated(function ($state, callable $set, $get) {
//                                         // recalc when price changed
//                                         self::recalculateItem($set, $get);
//                                     }),

//                                 /* Subtotal */
//                                 TextInput::make('subtotal')
//                                     ->label('Subtotal')
//                                     ->disabled()
//                                     ->reactive()
//                                     ->formatStateUsing(fn ($state) =>
//                                         Number::format((float) ($state ?? 0), locale: 'id')
//                                     )
//                                     ->dehydrated(false),

//                                 /* Pajak item (%) */
//                                 TextInput::make('tax_individual')
//                                     ->label('Pajak Item (%)')
//                                     ->numeric()
//                                     ->default(0)
//                                     ->reactive()
//                                     ->afterStateUpdated(function ($state, callable $set, $get) {
//                                         // recalc when tax% changed
//                                         self::recalculateItem($set, $get);
//                                     }),

//                                 /* Nominal Pajak Item */
//                                 TextInput::make('tax_amount_individual')
//                                     ->label('Nominal Pajak')
//                                     ->disabled()
//                                     ->reactive()
//                                     ->formatStateUsing(fn ($s) =>
//                                         Number::format((float) ($s ?? 0), locale: 'id')
//                                     )
//                                     ->dehydrated(false),

//                                 /* Total After Pajak */
//                                 TextInput::make('total_after_tax_individual')
//                                     ->label('Total Setelah Pajak')
//                                     ->disabled()
//                                     ->reactive()
//                                     ->formatStateUsing(fn ($s) =>
//                                         Number::format((float) ($s ?? 0), locale: 'id')
//                                     )
//                                     ->dehydrated(false),
//                             ])
//                             ->columns(3),

//                         /* ---------------- Pajak Global ----------------- */
//                         TextInput::make('tax_global')
//                             ->label('Pajak Global (%)')
//                             ->numeric()
//                             ->default(0)
//                             ->reactive()
//                             ->afterStateUpdated(fn ($state, callable $set, $get) =>
//                                 self::recalculateGlobal($set, $get)
//                             ),

//                         TextInput::make('tax_global_amount')
//                             ->label('Nominal Pajak Global')
//                             ->disabled()
//                             ->reactive()
//                             ->formatStateUsing(fn ($s) =>
//                                 Number::format((float) ($s ?? 0), locale: 'id')
//                             )
//                             ->dehydrated(false),

//                         /* ---------------- Total Akhir ----------------- */
//                         TextInput::make('total_amount')
//                             ->label('Total Akhir')
//                             ->disabled()
//                             ->reactive()
//                             ->formatStateUsing(fn ($s) =>
//                                 Number::format((float) ($s ?? 0), locale: 'id')
//                             )
//                             ->dehydrated(),
//                     ]),

//                 /* ==========================================================
//                  * PAGE 3 — Informasi Tambahan
//                  * ========================================================== */
//                 WizardStep::make('Informasi Tambahan')
//                     ->schema([
//                         Textarea::make('notes')
//                             ->label('Catatan')
//                             ->columnSpanFull(),

//                         TextInput::make('submitted_by')
//                             ->label('Diajukan oleh (User ID)')
//                             ->numeric()
//                             ->required(),

//                         DateTimePicker::make('submitted_at')
//                             ->label('Tanggal Pengajuan')
//                             ->required(),

//                         Select::make('status')
//                             ->label('Status')
//                             ->options([
//                                 'draft' => 'Draft',
//                                 'submitted' => 'Submitted',
//                                 'reviewed' => 'Reviewed',
//                                 'approved' => 'Approved',
//                                 'rejected' => 'Rejected',
//                                 'revision' => 'Revision',
//                             ])
//                             ->default('draft'),

//                         Textarea::make('rejection_reason')->columnSpanFull(),
//                         Textarea::make('revision_notes')->columnSpanFull(),
//                     ]),
//             ])
//             ->columnSpanFull()
//         ]);
//     }

//     /* ==========================================================
//      * LOGIC PERHITUNGAN ITEM
//      * ========================================================== */
//     public static function recalculateItem($set, $get)
//     {
//         // get qty and unit price robustly (handle formatted string or numeric)
//         $qtyRaw = $get('qty') ?? 0;
//         $unitRaw = $get('unit_price') ?? 0;

//         $qty = is_numeric($qtyRaw) ? (float) $qtyRaw : (float) preg_replace('/[^\d\.]/', '', $qtyRaw);
//         $unit = is_numeric($unitRaw) ? (float) $unitRaw : (float) preg_replace('/[^\d\.]/', '', $unitRaw);

//         $subtotal = $qty * $unit;

//         $taxPercent = ((float) ($get('tax_individual') ?? 0)) / 100;
//         $taxAmount = $subtotal * $taxPercent;
//         $total = $subtotal + $taxAmount;

//         // set computed values for this repeater item
//         $set('subtotal', $subtotal);
//         $set('tax_amount_individual', $taxAmount);
//         $set('total_after_tax_individual', $total);

//         // after updating an item, also recalc global totals
//         self::recalculateGlobal($set, $get);
//     }

//     /* ==========================================================
//      * LOGIC PERHITUNGAN GLOBAL
//      * ========================================================== */
//     public static function recalculateGlobal($set, $get)
//     {
//         $itemsRaw = $get('items') ?? [];

//         $totalItems = collect($itemsRaw)->map(function ($it) {
//             // prefer explicit total_after_tax_individual if present and numeric
//             $t = $it['total_after_tax_individual'] ?? null;
//             if (is_numeric($t)) {
//                 return (float) $t;
//             }

//             // otherwise compute from qty, unit_price, tax_individual
//             $qty = $it['qty'] ?? 0;
//             $unit = $it['unit_price'] ?? 0;
//             $taxPercent = ($it['tax_individual'] ?? 0) / 100;

//             $qty = is_numeric($qty) ? (float) $qty : (float) preg_replace('/[^\d\.]/', '', $qty);
//             $unit = is_numeric($unit) ? (float) $unit : (float) preg_replace('/[^\d\.]/', '', $unit);

//             $subtotal = $qty * $unit;
//             $tax = $subtotal * $taxPercent;

//             return $subtotal + $tax;
//         })->sum();

//         $taxPercentGlobal = ((float) ($get('tax_global') ?? 0)) / 100;
//         $taxGlobal = $totalItems * $taxPercentGlobal;
//         $grandTotal = $totalItems + $taxGlobal;

//         $set('tax_global_amount', $taxGlobal);
//         $set('total_amount', $grandTotal);
//     }clear

// }
namespace App\Filament\Program\Resources\BudgetProposals\Schemas;

use Filament\Facades\Filament;
use Filament\Forms\Components\{Select, TextInput, Textarea, DateTimePicker, Repeater};
use Filament\Schemas\Components\Wizard as ComponentsWizard;
use Filament\Schemas\Components\Wizard\Step as WizardStep;
use Illuminate\Support\Number;
use Filament\Schemas\Schema;

class BudgetProposalForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            ComponentsWizard::make([

                /* ==========================================================
                 * PAGE 1 — Informasi Dasar
                 * ========================================================== */
                WizardStep::make('Informasi Dasar')
                    ->schema([
                        Select::make('program_id')
                            ->label('Program')
                            ->relationship('program', 'name')
                            ->default(fn () => Filament::getTenant()?->id)
                            ->disabled()
                            ->dehydrated(),

                        Select::make('activity_plan_id')
                            ->relationship('activityPlan', 'name')
                            ->getOptionLabelFromRecordUsing(fn ($record) =>
                                '<strong>' . $record->activity_code . '</strong> : ' . $record->name
                            )
                            ->searchable()
                            ->allowHtml()
                            ->preload()
                            ->required(),

                        TextInput::make('proposal_number')
                            ->label('Nomor Proposal')
                            ->required(),
                    ]),

                /* ==========================================================
                 * PAGE 2 — Rincian Anggaran
                 * ========================================================== */
                WizardStep::make('Rincian Anggaran')
                    ->schema([

                        /* ------------------------ ITEMS ------------------------ */
                        Repeater::make('items')
                            ->label('Rincian Anggaran')
                            ->reactive() // penting: membuat repeater meng-trigger reactive updates
                            ->afterStateUpdated(function ($state, callable $set, $get) {
                                // ketika items berubah (add/remove/reorder), recalc global totals
                                self::recalculateGlobal($set, $get);
                            })
                            ->schema([
                                TextInput::make('item_name')
                                    ->label('Nama Item')
                                    ->required(),

                                TextInput::make('qty')
                                    ->label('Qty')
                                    ->default(1)
                                    ->numeric()
                                    ->reactive()
                                    ->afterStateUpdated(function ($state, callable $set, $get) {
                                        // recalc when qty changed
                                        self::recalculateItem($set, $get);
                                    }),

                                /* Harga satuan dengan formatting rupiah
                                   NOTE: tidak memberi default 0 agar tidak mem-prepend '0' saat mengetik */
                                TextInput::make('unit_price')
                                    ->label('Harga Satuan')
                                    ->numeric()
                                    ->reactive()
                                    ->placeholder('0')
                                    ->formatStateUsing(fn ($state) =>
                                        // tampilkan kosong jika belum ada nilai
                                        $state === null || $state === '' ? null :
                                        Number::format((float) preg_replace('/[^\d]/', '', $state), locale: 'id')
                                    )
                                    ->dehydrateStateUsing(fn ($state) =>
                                        // simpan sebagai angka (float); kembalikan 0 jika kosong
                                        $state === null || $state === '' ? 0.0 : (float) preg_replace('/[^\d]/', '', $state)
                                    )
                                    ->afterStateUpdated(function ($state, callable $set, $get) {
                                        // recalc when price changed
                                        self::recalculateItem($set, $get);
                                    }),

                                /* Subtotal (qty * unit_price) - computed */
                                TextInput::make('subtotal')
                                    ->label('Subtotal')
                                    ->disabled()
                                    ->reactive()
                                    ->formatStateUsing(fn ($state) =>
                                        Number::format((float) ($state ?? 0), locale: 'id')
                                    )
                                    ->dehydrated(false),

                                /* Pajak item (%) */
                                TextInput::make('tax_individual')
                                    ->label('Pajak Item (%)')
                                    ->numeric()
                                    ->default(0)
                                    ->reactive()
                                    ->afterStateUpdated(function ($state, callable $set, $get) {
                                        // recalc when tax% changed
                                        self::recalculateItem($set, $get);
                                    }),

                                /* Nominal Pajak Item - computed */
                                TextInput::make('tax_amount_individual')
                                    ->label('Nominal Pajak')
                                    ->disabled()
                                    ->reactive()
                                    ->formatStateUsing(fn ($s) =>
                                        Number::format((float) ($s ?? 0), locale: 'id')
                                    )
                                    ->dehydrated(false),

                                /* Total After Pajak - computed */
                                TextInput::make('total_after_tax_individual')
                                    ->label('Total Setelah Pajak')
                                    ->disabled()
                                    ->reactive()
                                    ->formatStateUsing(fn ($s) =>
                                        Number::format((float) ($s ?? 0), locale: 'id')
                                    )
                                    ->dehydrated(false),
                            ])
                            ->columns(3),

                        /* ---------------- Pajak Global ----------------- */
                        // TextInput::make('tax_global')
                        //     ->label('Pajak Global (%)')
                        //     ->numeric()
                        //     ->default(0)
                        //     ->reactive()
                        //     ->afterStateUpdated(function ($state, callable $set, $get) {
                        //         // recalc apabila user ubah tax global
                        //         self::recalculateGlobal($set, $get);
                        //     }),

                        // TextInput::make('tax_global_amount')
                        //     ->label('Nominal Pajak Global')
                        //     ->disabled()
                        //     ->reactive()
                        //     ->formatStateUsing(fn ($s) =>
                        //         Number::format((float) ($s ?? 0), locale: 'id')
                        //     )
                        //     ->dehydrated(false),

                        /* ---------------- Total Akhir ----------------- */
                        TextInput::make('total_amount')
                            ->label('Total Akhir')
                            ->disabled()
                            ->reactive()
                            ->formatStateUsing(fn ($s) =>
                                Number::format((float) ($s ?? 0), locale: 'id')
                            )
                            ->dehydrated(),

                        // TextInput::make('tor_document'),
                        // TextInput::make('rab_document'),
                    ]),

                /* ==========================================================
                 * PAGE 3 — Informasi Tambahan
                 * ========================================================== */
                WizardStep::make('Informasi Tambahan')
                    ->schema([
                        Textarea::make('notes')
                            ->label('Catatan')
                            ->columnSpanFull(),

                        TextInput::make('submitted_by')
                            ->label('Diajukan oleh (User ID)')
                            ->numeric()
                            ->required(),

                        DateTimePicker::make('submitted_at')
                            ->label('Tanggal Pengajuan')
                            ->required(),

                        Select::make('status')
                            ->label('Status')
                            ->options([
                                'draft' => 'Draft',
                                'submitted' => 'Submitted',
                                'reviewed' => 'Reviewed',
                                'approved' => 'Approved',
                                'rejected' => 'Rejected',
                                'revision' => 'Revision',
                            ])
                            ->default('draft'),

                        Textarea::make('rejection_reason')->columnSpanFull(),
                        Textarea::make('revision_notes')->columnSpanFull(),
                    ]),
            ])
            ->columnSpanFull()
        ]);
    }

    /* ==========================================================
     * LOGIC PERHITUNGAN ITEM
     * - menerima $set dan $get closure dari Filament hooks
     * ========================================================== */
    public static function recalculateItem($set, $get)
    {
        // dapatkan nilai kasar dari state
        $qtyRaw = $get('qty') ?? 0;
        $unitRaw = $get('unit_price') ?? 0;

        // bersihkan/parse nilai (meng-handle string berformat)
        $qty = is_numeric($qtyRaw) ? (float) $qtyRaw : (float) preg_replace('/[^\d\.]/', '', $qtyRaw);
        $unit = is_numeric($unitRaw) ? (float) $unitRaw : (float) preg_replace('/[^\d\.]/', '', $unitRaw);

        // hitung subtotal & pajak item
        $subtotal = $qty * $unit;
        $taxPercent = ((float) ($get('tax_individual') ?? 0)) / 100;
        $taxAmount = $subtotal * $taxPercent;
        $total = $subtotal + $taxAmount;

        // set nilai computed ke state repeater item
        $set('subtotal', $subtotal);
        $set('tax_amount_individual', $taxAmount);
        $set('total_after_tax_individual', $total);

        // setelah recalc item, update total global juga
        self::recalculateGlobal($set, $get);
    }

    /* ==========================================================
     * LOGIC PERHITUNGAN GLOBAL
     * - selalu membaca state 'items' dan 'tax_global'
     * ========================================================== */
    public static function recalculateGlobal($set, $get)
    {
        $itemsRaw = $get('items') ?? [];

        $totalItems = collect($itemsRaw)->map(function ($it) {
            // jika total_after_tax_individual tersedia dan numeric -> pakai
            $t = $it['total_after_tax_individual'] ?? null;
            if (is_numeric($t)) {
                return (float) $t;
            }

            // jika tidak, hitung dari qty/unit/tax
            $qty = $it['qty'] ?? 0;
            $unit = $it['unit_price'] ?? 0;
            $taxPercent = ($it['tax_individual'] ?? 0) / 100;

            $qty = is_numeric($qty) ? (float) $qty : (float) preg_replace('/[^\d\.]/', '', $qty);
            $unit = is_numeric($unit) ? (float) $unit : (float) preg_replace('/[^\d\.]/', '', $unit);

            $subtotal = $qty * $unit;
            $tax = $subtotal * $taxPercent;

            return $subtotal + $tax;
        })->sum();

        $taxPercentGlobal = ((float) ($get('tax_global') ?? 0)) / 100;
        $taxGlobal = $totalItems * $taxPercentGlobal;
        $grandTotal = $totalItems + $taxGlobal;

        $set('tax_global_amount', $taxGlobal);
        $set('total_amount', $grandTotal);
    }
}

