<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Members Report — Mukusho Karate Kenya</title>
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
        .badge-active { background: #DCFCE7; color: #166534; }
        .badge-pending { background: #FEF3C7; color: #92400E; }
        .badge-inactive { background: #F1F5F9; color: #475569; }
        .badge-yes { background: #DCFCE7; color: #166534; }
        .badge-no { background: #FEE2E2; color: #991B1B; }
        .footer { text-align: center; margin-top: 30px; font-size: 10px; color: #999; border-top: 1px solid #E2E8F0; padding-top: 10px; }
        @media print { body { padding: 0; } }
    </style>
</head>
<body>
    <div class="header">
        <h1>MUKUSHO KARATE KENYA</h1>
        <p>Members Report — Generated on {{ now()->format('d F Y, H:i') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Program</th>
                <th>Belt</th>
                <th>Paid</th>
                <th>Status</th>
                <th>Registered</th>
            </tr>
        </thead>
        <tbody>
            @forelse($members as $member)
            <tr>
                <td>{{ $member->id }}</td>
                <td><strong>{{ $member->full_name }}</strong></td>
                <td>{{ $member->email }}</td>
                <td>{{ $member->phone }}</td>
                <td>{{ ucfirst($member->program) }}</td>
                <td>{{ $member->belt_rank }}</td>
                <td><span class="badge {{ $member->membership_paid ? 'badge-yes' : 'badge-no' }}">{{ $member->membership_paid ? 'Yes' : 'No' }}</span></td>
                <td><span class="badge badge-{{ $member->status }}">{{ ucfirst($member->status) }}</span></td>
                <td>{{ $member->created_at->format('d M Y') }}</td>
            </tr>
            @empty
            <tr><td colspan="9" style="text-align:center; padding:20px; color:#999;">No members found.</td></tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        <p>Mukusho Karate Kenya — Othaya, Nyeri County | 0724 216 488 | Use Ctrl+P / Cmd+P to print this page as PDF</p>
    </div>

    <script>window.onload = function() { window.print(); }</script>
</body>
</html>
