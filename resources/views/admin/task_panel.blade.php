@extends('admin.com_layout')

@section('content')

    <style>
        .table-box {
            background: white;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            height: 575px;
            width: 100%;
            overflow-x: auto;
            overflow-y: auto;
        }

        .table-box table {
            width: 100%;
            min-width: 1000px;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 15px;
            white-space: nowrap;
            text-align: center;
        }
    </style>

    <h2 class="text-primary mt-5 mx-5">Employee <span class="text-danger">Task Management</span> System</h2>
    <div class="table-box">
        <table>
            <tr class="table-heading text-dark">
                <th>Sr.</th>
                <th>Employee Name</th>
                <th>Task</th>
                <th>Task Asign Date</th>
                <th>Task Deadline Date</th>
                <th>status</th>
                <th>Action</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Vaibhav Raju Samarth</td>
                <td>
                    <div
                        style="width: 300px; max-height: 100px; overflow-y: auto; overflow-x: hidden; border: 1px solid white;
                                                                                    border-radius: 5px; padding: 8px; font-size: 14px; white-space: normal; word-wrap: break-word;">
                        Take the screenshot of our wbsites whole pages and make the one folder for it.
                    </div>
                </td>
                <td class="text-primary">2026-10-09</td>
                <td class="text-danger">2026-10-10</td>
                <td><span class="status bg-warning">In-Progress</span></td>
                <td>
                    <span class="status bg-primary"><i class="bi bi-pencil"></i></span> 
                    <span class="status bg-danger"><i class="bi bi-trash"></i></span>
                </td>
            </tr>

            <tr>
                <td>2</td>
                <td>Vaibhav Raju Samarth</td>
                <td>
                    <div
                        style="width: 300px; max-height: 100px; overflow-y: auto; overflow-x: hidden; border: 1px solid white;
                                                                                    border-radius: 5px; padding: 8px; font-size: 14px; white-space: normal; word-wrap: break-word;">
                        Take the screenshot of our wbsites whole pages and make the one folder for it.
                    </div>
                </td>
                <td class="text-primary">2026-10-09</td>
                <td class="text-danger">2026-10-10</td>
                <td><span class="status bg-warning">In-Progress</span></td>
                <td>
                    <span class="status bg-primary"><i class="bi bi-pencil"></i></span> 
                    <span class="status bg-danger"><i class="bi bi-trash"></i></span>
                </td>
            </tr>

            <tr>
                <td>3</td>
                <td>Vaibhav Raju Samarth</td>
                <td>
                    <div
                        style="width: 300px; max-height: 100px; overflow-y: auto; overflow-x: hidden; border: 1px solid white;
                                                                                    border-radius: 5px; padding: 8px; font-size: 14px; white-space: normal; word-wrap: break-word;">
                        Take the screenshot of our wbsites whole pages and make the one folder for it.
                    </div>
                </td>
                <td class="text-primary">2026-10-09</td>
                <td class="text-danger">2026-10-10</td>
                <td><span class="status bg-warning">In-Progress</span></td>
                <td>
                    <span class="status bg-primary"><i class="bi bi-pencil"></i></span> 
                    <span class="status bg-danger"><i class="bi bi-trash"></i></span>
                </td>
            </tr>

            <tr>
                <td>4</td>
                <td>Vaibhav Raju Samarth</td>
                <td>
                    <div
                        style="width: 300px; max-height: 100px; overflow-y: auto; overflow-x: hidden; border: 1px solid white;
                                                                                    border-radius: 5px; padding: 8px; font-size: 14px; white-space: normal; word-wrap: break-word;">
                        Take the screenshot of our wbsites whole pages and make the one folder for it.
                    </div>
                </td>
                <td class="text-primary">2026-10-09</td>
                <td class="text-danger">2026-10-10</td>
                <td><span class="status bg-warning">In-Progress</span></td>
                <td>
                    <span class="status bg-primary"><i class="bi bi-pencil"></i></span> 
                    <span class="status bg-danger"><i class="bi bi-trash"></i></span>
                </td>
            </tr>

            <tr>
                <td>5</td>
                <td>Vaibhav Raju Samarth</td>
                <td>
                    <div
                        style="width: 300px; max-height: 100px; overflow-y: auto; overflow-x: hidden; border: 1px solid white; justify-content: start;
                                                                                    border-radius: 5px; padding: 8px; font-size: 14px; white-space: normal; word-wrap: break-word;">
                        Take the screenshot of our wbsites whole pages and make the one folder for it.
                    </div>
                </td>
                <td class="text-primary">2026-10-09</td>
                <td class="text-danger">2026-10-10</td>
                <td><span class="status bg-warning">In-Progress</span></td>
                <td>
                    <span class="status bg-primary"><i class="bi bi-pencil"></i></span> 
                    <span class="status bg-danger"><i class="bi bi-trash"></i></span>
                </td>
            </tr>
        </table>
    </div>
@endsection