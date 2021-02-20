<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Today's Bookings</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Today's bookings yet to be posted.
                </div>
            </div>
            <br/>
            <div class="card">
                <div class="card-header">Bet9ja Booking Codes</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Bet9ja codes yet to be posted today.
                </div>
            </div>
        </div>
    </div>
</div>