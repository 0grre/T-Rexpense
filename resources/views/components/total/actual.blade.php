<div class="card w-96 bg-base-100 shadow-xl">
    <div class="card-body">
        <div class="tooltip hover:tooltip-open tooltip-top" data-tip="Actual total amount with paid expenses">
        <h2 class="card-title my-4">{{ $totals['actual'] }} €</h2>
        </div>
        <div class="tooltip hover:tooltip-open tooltip-top" data-tip="final total amount with all monthly expenses">
        <h2 class="card-title text-secondary my-4">{{ $totals['final'] }} €</h2>
        </div>
    </div>
</div>
