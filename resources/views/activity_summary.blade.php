<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activity Report | {{env('APP_NAME')}}</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <td>N°</td>
                <td>ACTIVITIES</td>
                <td>Note</td>
                <td>Status</td>
                <td>Deadline for completion of activity</td>
                <td>Budget</td>
                <td>Actual spent</td>
            </tr>
        </thead>
        <tbody>
            @for($i=1; $i <= count($activities); $i++)
                @if ($activities[$i - 1]->outcome_id)
                    <tr>
                        <td style="color: lime; font-weight: bolder" colspan="6">
                            {{$activities[$i -1]->outcome->name ?? ""}}
                        </td>
                    </tr>
                @endif
                <tr>
                    <td>{{$i ?? ""}}</td>
                    <td>{{$activities[$i - 1]->name ?? ""}}</td>
                    <td>{{$activities[$i - 1]->description ?? ""}}</td>
                    <td>{{$activities[$i - 1]->status ?? ""}}</td>
                    <td>{{$activities[$i - 1]->end_date ?? ""}}</td>
                    <td>{{$activities[$i - 1]->budget ?? ""}}</td>
                    <td>{{$activities[$i - 1]->amount_spent ?? ""}}</td>
                </tr>
                @if ($activities[$i - 1]['children'] && count($activities[$i - 1]['children']) > 0 )
                    @for ($j = 0; $j < count($activities[$i - 1]['children']); $j++)
                    <tr>
                        <td>{{$i ?? ""}}</td>
                        <td>{{$activities[$i - 1]['children'][$j]->name ?? ""}}</td>
                        <td>{{$activities[$i - 1]['children'][$j]->description ?? ""}}</td>
                        <td>{{$activities[$i - 1]['children'][$j]->status ?? ""}}</td>
                        <td>{{$activities[$i - 1]['children'][$j]->end_date ?? ""}}</td>
                        <td>{{$activities[$i - 1]['children'][$j]->budget ?? ""}}</td>
                        <td>{{$activities[$i - 1]['children'][$j]->amount_spent ?? ""}}</td>
                    </tr>
                    @endfor
                    
                @endif
            @endfor
        </tbody>
    </table>
    
</body>
</html>