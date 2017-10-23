<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Bittrex Market</title>

    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Muli:300,400,700">
    <link rel="stylesheet" type="text/css" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="//maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome-font-awesome.min.css">
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            /*font-family: 'Raleway', sans-serif;*/
            
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }
        .main {
            display: flex;
            align-content: center;
        }
    </style>
</head>

<body>
    <header class="header">
        <nav class="navbar navbar-expand-lg">
            <div class="search-panel">
                <div class="search-inner d-flex align-items-center justify-content-center">
                    <div class="close-btn">Close <i class="fa fa-close"></i>
                    </div>
                    <form id="searchForm" action="#">
                        <div class="form-group">
                            <input type="search" name="search" placeholder="What are you searching for...">
                            <button type="submit" class="submit">Search</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="container-fluid d-flex align-items-center justify-content-between">
                <div class="navbar-header">
                    <a href="/" class="navbar-brand">
                        <div class="brand-text brand-big visible text-uppercase"><strong class="text-primary">Bittrex</strong><strong>Mash</strong>
                        </div>
                        <div class="brand-text brand-sm"><strong class="text-primary">D</strong><strong>A</strong>
                        </div>
                    </a>
                    <button class="sidebar-toggle"><i class="fa fa-long-arrow-left"></i>
                    </button>
                </div>
            </div>
        </nav>
    </header>
    <div class="d-flex align-items-stretch">
        <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">
                    <h2 class="h5 no-margin-bottom">Dashboard</h2>
                </div>
            </div>