<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Payments Report — Mukusho Karate Kenya</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; font-size: 12px; color: #333; padding: 20px; }
        .header { text-align: center; margin-bottom: 30px; border-bottom: 3px solid #B91C1C; padding-bottom: 15px; }
        .header h1 { font-size: 22px; color: #B91C1C; margin-bottom: 5px; }
        .header p { color: #666; font-size: 11px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th { background: #1E293B; color: white; padding: 8px 10px; text-align: left; font-size: 10px; text-transform: uppercase; letter-spacing: 0.5px; }
        td { padding: 7px 10px; border-bottom: 1px solid #E2E8F0; font-size: 11px; }
        tr:nth-child(even) { background: #F8FAFC; }
        .badge { display: inline-block; padding: 2px 8px; border-radius: 10px; font-size: 10px; font-weight: bold; }
        .badge-completed { background: #DCFCE7; color: #166534; }
        .badge-pending { background: #FEF3C7; color: #92400E; }
        .badge-failed { background: #FEE2E2; color: #991B1B; }
        .badge-registration { background: #DBEAFE; color: #1E40AF; }
        .badge-monthly { background: #F3E8FF; color: #6B21A8; }
        .footer { text-align: center; margin-top: 30px; font-size: 10px; color: #999; border-top: 1px solid #E2E8F0; padding-top: 10px; }
        .summary { margin-top: 20px; text-align: right; font-size: 13px; }
        .summary strong { color: #166534; }
        @media print { body { padding: 0; } }
    </style>
</head>
<body>
    <div class="header">
        <h1>MUKUSHO KARATE KENYA</h1>
        <p>Payments Report — Generated on {{ now()->format('d F Y, H:i') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Member</th>
                <th>Amount (KSH)</th>
                <th>Type</th>
                <th>M-Pesa Receipt</th>
                <th>Phone</th>
                <th>Month For</th>
                <th>Status</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @forelse($payments as $payment)
            <tr>
                <td>{{ $payment->id }}</td>
                <td><strong>{{ $payment->member->full_name ?? 'N/A' }}</strong></td>
                <td>{{ number_format($payment->amount) }}</td>
                <td><span class="badge badge-{{ $payment->payment_type }}">{{ ucfirst($payment->payment_type) }}</span></td>
                <td style="font-family:monospace;">{{ $payment->mpesa_receipt ?? '—' }}</td>
                <td>{{ $payment->mpesa_phone ?? '—' }}</td>
                <td>{{ $payment->month_for ?? '—' }}</td>
                <td><span class="badge badge-{{ $payment->status }}">{{ ucfirst($payment->status) }}</span></td>
                <td>{{ $payment->transaction_date ? $payment->transaction_date->format('d M Y H:i') : $payment->created_at->format('d M Y H:i') }}</td>
            </tr>
            @empty
            <tr><td colspan="9" style="text-align:center; padding:20px; color:#999;">No payments found.</td></tr>
            @endforelse
        </tbody>
    </table>

    @if($payments->count())
    <div class="summary">
        Total Payments: <strong>KSH {{ number_format($payments->where('status', 'completed')->sum('amount')) }}</strong>
    </div>
    @endif

    <div class="footer">
        <p>Mukusho Karate Kenya — Othaya, Nyeri County | 0724 216 488 | Use Ctrl+P / Cmd+P to print this page as PDF</p>
    </div>

    <script>window.onload = function() { window.print(); }</script>
</body>
</html>
