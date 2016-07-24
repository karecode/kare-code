/*
 * Charts Initialization and Options
 */

/*Document Ready*/
jQuery(document).ready(function($) {
	'use strict';

	// We use random data for the sake of demonstration. Enter your custom data to display on charts. Please refer to http://www.chartjs.org/docs/
	var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
	
	
	/* Line Chart
	*********************************************************************/
	var lineChartData = {
		labels : ["January","February","March","April","May","June","July"],
		datasets : [
			{
				fillColor : "rgba(220,220,220,0.2)",
				strokeColor : "#ccc",
				pointColor : "#ccc",
				pointStrokeColor : "#fff",
				pointHighlightFill : "#fff",
				pointHighlightStroke : "#ccc",
				data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
			},
			{
				fillColor : "rgba(90,200,250,0.2)",
				strokeColor : "#5ac8fa",
				pointColor : "#5ac8fa",
				pointStrokeColor : "#fff",
				pointHighlightFill : "#fff",
				pointHighlightStroke : "#5ac8fa",
				data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
			}
		]

	}


	/* Bar Chart
	*********************************************************************/
	var barChartData = {
		labels : ["January","February","March","April","May","June","July"],
		datasets : [
			{
				fillColor : "rgba(220,220,220,0.5)",
				strokeColor : "#ccc",
				highlightFill: "rgba(220,220,220,0.75)",
				highlightStroke: "#ccc",
				data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
			},
			{
				fillColor : "rgba(90,200,250,0.5)",
				strokeColor : "#5ac8fa",
				highlightFill : "rgba(90,200,250,0.75)",
				highlightStroke : "#5ac8fa",
				data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
			}
		]

	}


	/* Pie Chart
	*********************************************************************/
	var pieData = [
		{
			value: randomScalingFactor(),
			color:"#ff2d55",
			highlight: "#fb4e6f",
			label: "Red"
		},
		{
			value: randomScalingFactor(),
			color: "#4cd964",
			highlight: "#64db78",
			label: "Green"
		},
		{
			value: randomScalingFactor(),
			color: "#ff9500",
			highlight: "#fda326",
			label: "Yellow"
		},
		{
			value: randomScalingFactor(),
			color: "#5ac8fa",
			highlight: "#74d0fa",
			label: "Blue"
		},
		{
			value: randomScalingFactor(),
			color: "#4d4d4d",
			highlight: "#606060",
			label: "Grey"
		}

	];

	
	/* Pie Chart
	*********************************************************************/
	var doughnutData = [
		{
			value: randomScalingFactor(),
			color:"#ff2d55",
			highlight: "#fb4e6f",
			label: "Red"
		},
		{
			value: randomScalingFactor(),
			color: "#4cd964",
			highlight: "#64db78",
			label: "Green"
		},
		{
			value: randomScalingFactor(),
			color: "#ff9500",
			highlight: "#fda326",
			label: "Yellow"
		},
		{
			value: randomScalingFactor(),
			color: "#5ac8fa",
			highlight: "#74d0fa",
			label: "Blue"
		},
		{
			value: randomScalingFactor(),
			color: "#4d4d4d",
			highlight: "#606060",
			label: "Grey"
		}

	];


	/* Polar Area Chart
	*********************************************************************/
	var polarData = [
		{
			value: randomScalingFactor(),
			color:"#ff2d55",
			highlight: "#fb4e6f",
			label: "Red"
		},
		{
			value: randomScalingFactor(),
			color: "#4cd964",
			highlight: "#64db78",
			label: "Green"
		},
		{
			value: randomScalingFactor(),
			color: "#ff9500",
			highlight: "#fda326",
			label: "Yellow"
		},
		{
			value: randomScalingFactor(),
			color: "#5ac8fa",
			highlight: "#74d0fa",
			label: "Blue"
		},
		{
			value: randomScalingFactor(),
			color: "#4d4d4d",
			highlight: "#606060",
			label: "Grey"
		}

	];


	/* Radar Chart
	*********************************************************************/
	var radarData = {
		labels: ["Eating", "Drinking", "Sleeping", "Designing", "Coding", "Cycling", "Running"],
		datasets: [
			{
				fillColor: "rgba(220,220,220,0.2)",
				strokeColor: "#ccc",
				pointColor: "#ccc",
				pointStrokeColor: "#fff",
				pointHighlightFill: "#fff",
				pointHighlightStroke: "#ccc",
				data: [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
			},
			{
				fillColor: "rgba(90,200,250,0.2)",
				strokeColor: "#5ac8fa",
				pointColor: "#5ac8fa",
				pointStrokeColor: "#fff",
				pointHighlightFill: "#fff",
				pointHighlightStroke: "#5ac8fa",
				data: [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
			}
		]
	};


	/* Charts Init (Using waypoints.js for initializing charts on scroll)
	*********************************************************************/

	// Line Chart
	$('#lineChart').waypoint(function(direction) {
		if(direction === "down") {
			var lineChart = new Chart(document.getElementById("lineChart").getContext("2d")).Line(lineChartData, {responsive:true});
		} else {
			this.destroy();
		}
	}, { offset: '87%' });

	// Bar Chart
	$('#barChart').waypoint(function(direction) {
		if(direction === "down") {
			var barChart = new Chart(document.getElementById("barChart").getContext("2d")).Bar(barChartData, {responsive:true});
		} else {
			this.destroy();
		}
	}, { offset: '87%' });

	// Pie Chart
	$('#pieChart').waypoint(function(direction) {
		if(direction === "down") {
			var pieChart = new Chart(document.getElementById("pieChart").getContext("2d")).Pie(pieData, {responsive:true});
		} else {
			this.destroy();
		}
	}, { offset: '87%' });

	// Doughnut Chart
	$('#doughnutChart').waypoint(function(direction) {
		if(direction === "down") {
			var doughnutChart = new Chart(document.getElementById("doughnutChart").getContext("2d")).Doughnut(doughnutData, {responsive:true});
		} else {
			this.destroy();
		}
	}, { offset: '87%' });

	// Polar Area Chart
	$('#polarChart').waypoint(function(direction) {
		if(direction === "down") {
			var polarChart = new Chart(document.getElementById("polarChart").getContext("2d")).PolarArea(polarData, {responsive:true});
		} else {
			this.destroy();
		}
	}, { offset: '87%' });

	// Radar Chart
	$('#radarChart').waypoint(function(direction) {
		if(direction === "down") {
			var radarChart = new Chart(document.getElementById("radarChart").getContext("2d")).Radar(radarData, {responsive:true});
		} else {
			this.destroy();
		}
	}, { offset: '87%' });


});/*Document Ready End*/