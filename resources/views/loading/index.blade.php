<!DOCTYPE html>
<html>

<head>
    <title>jQuery AJAX Loading Spinner Example in Laravel - Techsolutionstuff</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />

    <style type="text/css">
        .loading {
            z-index: 20;
            position: absolute;
            top: 0;
            left: -5px;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .loading-content {
            position: absolute;
            border: 16px solid #f3f3f3;
            border-top: 16px solid #3498db;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            top: 40%;
            left: 50%;
            animation: spin 2s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body>
    <div class="container">

        <section id="loading">
            <div id="loading-content"></div>
        </section>

        <div class="row mt-5 mb-5">
            <div class="col-10 offset-1 mt-5">
                <div class="card">
                    <div class="card-header">
                        <h3>jQuery AJAX Loading Spinner Example in Laravel - Techsolutionstuff</h3>
                    </div>
                    <div class="card-body">

                        <form method="POST" action="#" id="postForm">
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Title:</strong>
                                        <input type="text" name="title" class="form-control" placeholder="Title"
                                            value="{{ old('title') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Body:</strong>
                                        <textarea name="body" rows="3" class="form-control">{{ old('body') }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        @php
                                            // セレクトボックスに渡す配列
                                            $fruit = [
                                                'apple' => 'りんご',
                                                'orange' => 'みかん',
                                                'banana' => 'バナナ'   
                                            ];
                                        @endphp
                                        <!-- options要素にデータを渡す -->
                                        <x-select-box :options="$fruit"/>
                                    </div>
                                </div>
                                
                            </div>

                            <div class="form-group">
                                <button class="btn btn-success btn-submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

<script type="text/javascript">

    $(document).ajaxStart(function () {
        $('#loading').addClass('loading');
        $('#loading-content').addClass('loading-content');
    });

    $(document).ajaxStop(function () {
        $('#loading').removeClass('loading');
        $('#loading-content').removeClass('loading-content');
    });

</script>

<script type="text/javascript">

    $("#postForm").submit(function (e) {
        e.preventDefault();

        $.ajax({
            url: "your_ajax_url",
            type: "POST",
            dataType: 'json',
            data: {
                title: $("input[name='title']").val(),
                body: $("textarea[name='body']").val()
            },
            success: function (result) {
                console.log(result);
            }
        });
    });

</script>

</html>