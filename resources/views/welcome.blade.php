@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card" style="max-width: 80%;">
                <div class="card-header">Test page 1</div>
                <table class="table table-borderless" width="80%" id="logs-table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Action</th>
                        <th>Method</th>
                        <th>IP</th>
                        <th>City</th>
                        <th>Country</th>
                        <th>Type</th>
                        <th>Data</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        function deleteLog(id) {
            $.ajax({
                type: 'DELETE',
                url: `/api/logs/${id}`,
                success: () => {
                    getLogs();
                },
            })
        }

        function getLogs() {
            $.ajax({
                type: 'GET',
                url: "{{ route('logs.list') }}",
                success: showLogs,
            })
        }

        function showLogs(response) {
            if (response) {
                $("#logs-table > tbody").empty();
                response.data.map(item => {
                    $("#logs-table > tbody:last-child").append(
                        "<tr>" +
                        `   <td>${item.id}</td>` +
                        `   <td>${item.action}</td>` +
                        `   <td>${item.method}</td>` +
                        `   <td>${item.ip}</td>` +
                        `   <td>${item.city}</td>` +
                        `   <td>${item.country}</td>` +
                        `   <td>${item.type}</td>` +
                        `   <td>${item.data}</td>` +
                        `   <td>${item.created_at}</td>` +
                        `   <td><button class="btn btn-danger" onclick=deleteLog(${item.id})>Delete</button></td>` +
                        "</tr>"
                    );
                });
            }
        }

        $(document).ready(function () {
            getLogs();
        });
    </script>
@endsection
