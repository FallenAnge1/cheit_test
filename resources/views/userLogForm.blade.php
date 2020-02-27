@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card" style="width: 80%;">
                <div class="card-header">New Log</div>
                <form action="">
                    @csrf

                    @if(isset($log))
                        <input type="hidden" name="id" value="{{ $log['id'] }}">
                    @endif

                    <div class="form-group">
                        <label for="action">Action</label>
                        <input
                            required
                            type="text"
                            class="form-control"
                            name="action"
                            id="action"
                            placeholder="Action"
                            @if(isset($log))
                            value="{{ $log['action'] }}"
                            @endif
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
                            @if(isset($log))
                            value="{{ $log['method'] }}"
                            @endif
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
                            @if(isset($log))
                            value="{{ $log['ip'] }}"
                            @endif
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
                            @if(isset($log))
                            value="{{ $log['city'] }}"
                            @endif
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
                            @if(isset($log))
                            value="{{ $log['country'] }}"
                            @endif
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
                            @if(isset($log))
                            value="{{ $log['type'] }}"
                            @endif
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
                            @if(isset($log))
                            value="{{ $log['data'] }}"
                            @endif
                        >
                    </div>
                    <input
                        type="button"
                        name="submit"
                        @if(isset($log))
                        value="Update"
                        class="btn btn-warning"
                        onclick="updateLog(this.form)"
                        @else
                        value="Store"
                        class="btn btn-success"
                        onclick="storeLog(this.form)"
                        @endif
                    >
                </form>
            </div>
        </div>
    </div>
    <script>
        function storeLog(form) {
            const data = _readFormData(form);

            $.ajax({
                method: 'POST',
                url: "{{ route('logs.store') }}",
                data,
                success: () => window.location.replace("{{ route('home') }}"),
            });
        }

        function updateLog(form) {
            const data = _readFormData(form);

            const id = form.id.value;

            $.ajax({
                method: 'PUT',
                url: `/api/logs/${id}`,
                data,
                success: () => window.location.replace("{{ route('home') }}"),
            });
        }

        function _readFormData(form) {
            const data = {};
            data.action = form.action.value;
            data.method = form.method.value;
            data.ip = form.ip.value;
            data.city = form.city.value;
            data.country = form.country.value;
            data.type = form.type.value;
            data.data = form.data.value;
            data._token = form._token.value;

            return data;
        }
    </script>
@endsection
