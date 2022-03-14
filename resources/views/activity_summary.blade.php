<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activity Report | {{env('APP_NAME')}}</title>
</head>
<body>
    <table style="border-spacing: 0; border-top: 1px solid black; border-right: 1px solid black" width="100%">
        <thead style="font-weight: bolder">
            <tr>
                <td style="border-bottom: 1px solid black; border-left: 1px solid black">N°</td>
                <td style="border-bottom: 1px solid black; border-left: 1px solid black">ACTIVITIES</td>
                <td style="border-bottom: 1px solid black; border-left: 1px solid black">Note</td>
                <td style="border-bottom: 1px solid black; border-left: 1px solid black">Status</td>
                <td style="border-bottom: 1px solid black; border-left: 1px solid black">Deadline for completion of activity</td>
                <td style="border-bottom: 1px solid black; border-left: 1px solid black">Budget</td>
                <td style="border-bottom: 1px solid black; border-left: 1px solid black">Actual spent</td>
            </tr>
        </thead>
        <tbody>
            @php
                $num = 0;
            @endphp
            @for($i=1; $i <= count($activities); $i++)
                @php
                    $num += 1;
                @endphp
                @if ($activities[$i - 1]->outcome_id)
                    <tr>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black; color: lime; font-weight: bolder" colspan="7">
                            {{$activities[$i -1]->outcome->name ?? ""}}
                        </td>
                    </tr>
                @endif
                <tr>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black">{{$num ?? ""}}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black">{{$activities[$i - 1]->name ?? ""}}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black">{{$activities[$i - 1]->description ?? ""}}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black">{{$activities[$i - 1]->status ?? ""}}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black">{{$activities[$i - 1]->end_date ?? ""}}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black">{{$activities[$i - 1]->budget ?? ""}}</td>
                    <td style="border-bottom: 1px solid black; border-left: 1px solid black">{{$activities[$i - 1]->amount_spent ?? ""}}</td>
                </tr>
                @if ($activities[$i - 1]['children'] && count($activities[$i - 1]['children']) > 0 )
                    @for ($j = 0; $j < count($activities[$i - 1]['children']); $j++)
                        @php
                            $num += 1;
                        @endphp
                    <tr>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black">{{$num ?? ""}}</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black">{{$activities[$i - 1]['children'][$j]->name ?? ""}}</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black">{{$activities[$i - 1]['children'][$j]->description ?? ""}}</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black">{{$activities[$i - 1]['children'][$j]->status ?? ""}}</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black">{{$activities[$i - 1]['children'][$j]->end_date ?? ""}}</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black">{{$activities[$i - 1]['children'][$j]->budget ?? ""}}</td>
                        <td style="border-bottom: 1px solid black; border-left: 1px solid black">{{$activities[$i - 1]['children'][$j]->amount_spent ?? ""}}</td>
                    </tr>
                    @endfor
                    
                @endif
            @endfor
        </tbody>
    </table>
    
</body>
</html>