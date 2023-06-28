<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
	<title>Document</title>
	<link rel="stylesheet" href="./htaccess/style.css">
	<style>
		/* upload file css */
		.container {
			/* width: 500px; */

			/* display: flex; */
			flex-direction: column;
			align-items: center;
			justify-content: space-between;
			padding: 10px;
			gap: 5px;
			/* background-color: rgba(0, 110, 255, 0.041); */
		}

		.header {
			flex: 1;
			width: 100%;
			border: 2px dashed royalblue;
			border-radius: 10px;
			display: flex;
			align-items: center;
			justify-content: center;
			flex-direction: column;

		}

		.header svg {
			height: 100px;
		}

		.header p {
			text-align: center;
			color: black;
		}

		.footer {
			background-color: rgba(0, 110, 255, 0.075);
			width: 100%;
			height: 40px;
			padding: 8px;
			border-radius: 10px;
			cursor: pointer;
			display: flex;
			align-items: center;
			justify-content: flex-end;
			color: black;
			border: none;
		}

		.footer svg {
			height: 130%;
			fill: royalblue;
			background-color: rgba(70, 66, 66, 0.103);
			border-radius: 50%;
			padding: 2px;
			cursor: pointer;
			box-shadow: 0 2px 30px rgba(0, 0, 0, 0.205);
		}

		.footer p {
			flex: 1;
			text-align: center;
		}

		#file {
			display: none;
		}

		/* nút sửa xóa index */
		.Btn {
			position: relative;
			display: flex;
			align-items: center;
			justify-content: flex-start;
			width: 100px;
			height: 40px;
			border: none;
			padding: 0px 20px;
			color: white;
			font-weight: 500;
			cursor: pointer;
			border-radius: 10px;
			transition-duration: .3s;
		}

		.delete_btn {
			background-color: #FF6D28;
			box-shadow: 5px 5px 0px #FF6D28;
			margin-bottom: 10px;
		}

		.edit_btn {
			background-color: #19A7CE;
			box-shadow: 5px 5px 0px #19A7CE;
		}

		.svg {
			width: 13px;
			position: absolute;
			right: 0;
			margin-right: 20px;
			fill: white;
			transition-duration: .3s;
		}

		.Btn:hover {
			color: transparent;
		}

		.Btn:hover svg {
			right: 43%;
			margin: 0;
			padding: 0;
			border: none;
			transition-duration: .3s;
		}

		.Btn:active {
			transform: translate(3px, 3px);
			transition-duration: .3s;
			box-shadow: 2px 2px 0px rgb(140, 32, 212);
		}

		.btn_hover_list {
			padding: 17px 190px;
			border-radius: 20px;
			border: 0;
			background-color: #3FC5F0;
			box-shadow: rgb(0 0 0 / 5%) 0 0 8px;
			letter-spacing: 1.5px;
			text-transform: uppercase;
			font-size: 15px;
			transition: all .5s ease;
			float: left;
		}

		.btn_hover_add {
			padding: 17px 190px;
			border-radius: 20px;
			border: 0;
			background-color: #6DECB9;
			box-shadow: rgb(0 0 0 / 5%) 0 0 8px;
			letter-spacing: 1.5px;
			text-transform: uppercase;
			font-size: 15px;
			transition: all .5s ease;
			float: right;
		}

		.btn_hover_list:hover,
		.btn_hover_add:hover {
			letter-spacing: 3px;
			background-color: #FFB84C;
			color: hsl(0, 0%, 100%);
			box-shadow: #FFB84C 0px 7px 29px 0px;
		}

		.create_btn {
			border: 2px solid #24b4fb;
			background-color: #24b4fb;
			border-radius: 0.9em;
			padding: 10px 25px;
			transition: all ease-in-out 0.2s;
			font-size: 16px;
		}

		.create_btn span {
			display: flex;
			justify-content: center;
			align-items: center;
			color: #fff;
			font-weight: 600;
		}

		.create_btn:hover {
			background-color: #0071e2;
		}
	</style>
</head>

<body>
