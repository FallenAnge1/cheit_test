@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card" style="width: 80%;">
                <div class="card-header">New Log</div>
                <form action="">
                    @csrf

                    <div class="form-group">
                        <label for="action">Action</label>
                        <input
                            required
                            type="text"
                            class="form-control"
                            name="action"
                            id="action"
                            placeholder="Action"
                        >
                    </div>
                    <div class="form-group">
                        <label for="method">Method</label>
                        <input
                            required
                            type="text"
                            class="form-control"
                            name="method"
                            id="method"
                            placeholder="Method"
                        >
                    </div>
                    <div class="form-group">
                        <label for="ip">IP</label>
                        <input
                            required
                            type="text"
                            class="form-control"
                            name="ip"
                            id="ip"
                            placeholder="IP"
                        >
                    </div>
                    <div class="form-group">
                        <label for="city">City</label>
                        <input
                            type="text"
                            class="form-control"
                            name="city"
                            id="city"
                            placeholder="City"
                        >
                    </div>
                    <div class="form-group">
                        <label for="action">Country</label>
                        <input
                            type="text"
                            class="form-control"
                            name="country"
                            id="country"
                            placeholder="Country"
                        >
                    </div>
                    <div class="form-group">
                        <label for="type">Type</label>
                        <input
                            type="text"
                            class="form-control"
                            name="type"
                            id="type"
                            placeholder="Type"
                        >
                    </div>
                    <div class="form-group">
                        <label for="type">Data</label>
                        <input
                            type="text"
                            class="form-control"
                            name="data"
                            id="data"
                            placeholder="Data"
                        >
                    </div>
                    <input type="button" name="submit" value="Store" class="btn btn-success" onclick="storeLog(this.form)">
                </form>
            </div>
        </div>
    </div>
    <script>
        function storeLog(form) {
            const data = {};
            data.action = form.action.value;
            data.method = form.method.value;
            data.ip = form.ip.value;
            data.city = form.city.value;
            data.country = form.country.value;
            data.type = form.type.value;
            data.data = form.data.value;
            data._token = form._token.value;

            $.ajax({
                method: 'POST',
                url: "{{ route('logs.store') }}",
                data,
                success: () => window.location.replace("{{ route('home') }}"),
            });
        }
    </script>
@endsection
