@section('header-css')
    <style xmlns="http://www.w3.org/1999/html">
        *
        {
            user-select: none;
        }

        *:focus
        {
            outline: none;
        }

        html, body
        {
            height: 100%;
            min-height: 100%;
        }

        body
        {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding-bottom: 100px;
            margin: 0;
            background-color: #ebf3f3;
        }

        .brd
        {
            border: 1px solid #e2eded;
            border-color: #eaf1f1 #e4eded #dbe7e7 #e4eded;
        }

        #info
        {
            position: absolute;
            top: 0;
            right: 0;
            left: 0;
            color: #2d3667;
            font-size: 16px;
            text-align: center;
            padding: 14px;
            background-color: #f3f9f9;
        }

        #app-cover
        {
            position: absolute;
            top: 0;
            right: 0;
            left: 0;
            width: 300px;
            height: 42px;
            margin: 100px auto 0 auto;
        }

        #select-button
        {
            position: relative;
            height: 16px;
            padding: 12px 14px;
            background-color: #fff;
            border-radius: 4px;
            cursor: pointer;
        }

        #options-view-button
        {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100%;
            margin: 0;
            opacity: 0;
            cursor: pointer;
            z-index: 3;
        }

        #selected-value
        {
            font-size: 16px;
            line-height: 1;
            margin-right: 26px;
        }

        .option i
        {
            width: 16px;
            height: 16px;
        }

        .option, .label
        {
            color: #2d3667;
            font-size: 16px;
        }

        #chevrons
        {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            width: 12px;
            padding: 9px 14px;
        }

        #chevrons i
        {
            display: block;
            height: 50%;
            color: #d1dede;
            font-size: 12px;
            text-align: right;
        }

        #options-view-button:checked + #select-button #chevrons i
        {
            color: #2d3667;
        }

        .options
        {
            position: absolute;
            left: 0;
            width: 250px;
        }

        #options
        {
            position: absolute;
            top: 42px;
            right: 0;
            left: 0;
            width: 298px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 4px;
        }

        #options-view-button:checked ~ #options
        {
            border: 1px solid #e2eded;
            border-color: #eaf1f1 #e4eded #dbe7e7 #e4eded;
        }

        .option
        {
            position: relative;
            line-height: 1;
            transition: 0.3s ease all;
            z-index: 2;
        }

        .option i
        {
            position: absolute;
            left: 14px;
            padding: 0;
            display: none;
        }

        #options-view-button:checked ~ #options .option i
        {
            display: block;
            padding: 12px 0;
        }

        .label
        {
            display: none;
            padding: 0;
            margin-left: 27px;
        }

        #options-view-button:checked ~ #options .label
        {
            display: block;
            padding: 12px 14px;
        }

        .s-c
        {
            position: absolute;
            left: 0;
            width: 100%;
            height: 50%;
        }

        .s-c.top
        {
            top: 0;
        }

        .s-c.bottom
        {
            bottom: 0;
        }

        input[type="radio"]
        {
            position: absolute;
            right: 0;
            left: 0;
            width: 100%;
            height: 50%;
            margin: 0;
            opacity: 0;
            cursor: pointer;
        }

        .s-c:hover ~ i
        {
            color: #fff;
            opacity: 0;
        }

        .s-c:hover
        {
            height: 100%;
            z-index: 1;
        }

        .s-c.bottom:hover + i
        {
            bottom: -25px;
            animation: moveup 0.3s ease 0.1s forwards;
        }

        .s-c.top:hover ~ i
        {
            top: -25px;
            animation: movedown 0.3s ease 0.1s forwards;
        }

        @keyframes moveup
        {
            0%{ bottom: -25px; opacity: 0;}
            100%{ bottom: 0; opacity: 1;}
        }

        @keyframes movedown
        {
            0%{ top: -25px; opacity: 0;}
            100%{ top: 0; opacity: 1;}
        }

        .label
        {
            transition: 0.3s ease all;
        }

        .opt-val
        {
            position: absolute;
            left: 14px;
            width: 217px;
            height: 21px;
            opacity: 0;
            background-color: #fff;
            transform: scale(0);
        }

        .option input[type="radio"]:checked ~ .opt-val
        {
            opacity: 1;
            transform: scale(1);
        }

        .option input[type="radio"]:checked ~ i
        {
            top: 0;
            bottom: auto;
            opacity: 1;
            animation: unset;
        }

        .option input[type="radio"]:checked ~ i, .option input[type="radio"]:checked ~ .label
        {
            color:#fff;
        }

        .option input[type="radio"]:checked ~ .label:before
        {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            z-index: -1;
        }

        #options-view-button:not(:checked) ~ #options .option input[type="radio"]:checked ~ .opt-val
        {
            top: -30px;
        }

        .option:nth-child(1) input[type="radio"]:checked ~ .label:before
        {
            background-color: #000;
            border-radius: 4px 4px 0 0;
        }

        .option:nth-child(1) input[type="radio"]:checked ~ .opt-val
        {
            top: -31px;
        }

        .option:nth-child(2) input[type="radio"]:checked ~ .label:before
        {
            background-color: #ea4c89;
        }

        .option:nth-child(2) input[type="radio"]:checked ~ .opt-val
        {
            top: -71px;
        }

        .option:nth-child(3) input[type="radio"]:checked ~ .label:before
        {
            background-color: #0057ff;
        }

        .option:nth-child(3) input[type="radio"]:checked ~ .opt-val
        {
            top: -111px;
        }

        .option:nth-child(4) input[type="radio"]:checked ~ .label:before
        {
            background-color: #32c766;
        }

        .option:nth-child(4) input[type="radio"]:checked ~ .opt-val
        {
            top: -151px;
        }

        .option:nth-child(5) input[type="radio"]:checked ~ .label:before
        {
            background-color: #f48024;
        }

        .option:nth-child(5) input[type="radio"]:checked ~ .opt-val
        {
            top: -191px;
        }

        .option:nth-child(6) input[type="radio"]:checked ~ .label:before
        {
            background-color: #006400;
            border-radius: 0 0 4px 4px;
        }

        .option:nth-child(6) input[type="radio"]:checked ~ .opt-val
        {
            top: -231px;
        }

        .option .fa-codepen
        {
            color: #000;
        }

        .option .fa-dribbble
        {
            color: #ea4c89;
        }

        .option .fa-behance
        {
            color: #0057ff;
        }

        .option .fa-hackerrank
        {
            color: #32c766;
        }

        .option .fa-stack-overflow
        {
            color: #f48024;
        }

        .option .fa-free-code-camp
        {
            color: #006400;
        }

        #option-bg
        {
            position: absolute;
            top: 0;
            right: 0;
            left: 0;
            height: 40px;
            transition: 0.3s ease all;
            z-index: 1;
            display: none;
        }

        #options-view-button:checked ~ #options #option-bg
        {
            display: block;
        }

        .option:hover .label
        {
            color: #fff;
        }

        .option:nth-child(1):hover ~ #option-bg
        {
            top: 0;
            background-color: #000;
            border-radius: 4px 4px 0 0;
        }

        .option:nth-child(2):hover ~ #option-bg
        {
            top: 40px;
            background-color: #ea4c89;
        }

        .option:nth-child(3):hover ~ #option-bg
        {
            top: 80px;
            background-color: #0057ff;
        }

        .option:nth-child(4):hover ~ #option-bg
        {
            top: 120px;
            background-color: #32c766;
        }

        .option:nth-child(5):hover ~ #option-bg
        {
            top: 160px;
            background-color: #f48024;
        }

        .option:nth-child(6):hover ~ #option-bg
        {
            top: 200px;
            background-color: #006400;
            border-radius: 0 0 4px 4px;
        }

        #ytd-url {
            display: block;
            position: fixed;
            right: 0;
            bottom: 0;
            padding: 10px 14px;
            margin: 20px;
            color: #fff;
            font-size: 14px;
            text-decoration: none;
            background-color: #143240;
            border-radius: 4px;
            box-shadow: 0 10px 20px -5px rgba(20, 50, 64, 0.76);
        }
    </style>
@endsection
<div class="modal fade" id="kt_scrollable_modal_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Add New  Permission </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body" >
                <div class="scroll scroll-pull" data-scroll="true" data-height="250">
                    <form  method="post" action="{{route('admin.permissions.store')}}">
                        @csrf
                        <div class="form-group"  >
                            <label for="permission"> Add Permission </label>
                            <select class="form-control" id="permission" name="permission">
                                <option value="list"> Permission to Show Data</option>
                                <option value="create">Permission to create New Data</option>
                                <option value="edit">Permission to edit Data</option>
                                <option value="update">Permission to update Data</option>
                                <option value="delete">Permission to delete Data</option>
                            </select>
                        </div>
                        @error('permission')<label class="btn-danger"> {{$message}}</label>@enderror
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" >Close</button>
                        <input type="submit" value="Submit" class="btn btn-primary" id="kt_blockui_4_1">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




