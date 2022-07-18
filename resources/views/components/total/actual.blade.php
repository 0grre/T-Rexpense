<div class="card-body">
    <div class="stats stats-vertical shadow">
        <div class="stat">
            <div class="stat-title">Current balance</div>
            <div class="stat-value">{{ number_format($totals['actual'], 2) }} €</div>
            <div class="stat-desc">{{ \Carbon\Carbon::now()->format('l jS \of F Y') }}</div>
        </div>

        <div class="stat">
            <div class="stat-title">Account balance</div>
            <div class="stat-value text-secondary">{{ number_format($totals['final'], 2) }} €</div>
            <div class="stat-desc">{{ \Carbon\Carbon::now()->lastOfMonth()->format('l jS \of F Y') }}</div>
        </div>

        @foreach($budgets as $budget)
        <div class="stat">
            <div class="stat-title">{{ $budget->name }}</div>
            <div class="stat-value">{{ number_format($budget->actual_amount, 2) }} €</div>
            <div class="stat-desc">{{ number_format($budget->amount, 2) }} € ({{ (($budget->actual_amount - $budget->amount) / $budget->amount) * 100  }} %)</div>
        </div>
        @endforeach
    </div>
</div>

