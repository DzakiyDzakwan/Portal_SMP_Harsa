var optionsProfileVisit = {
	annotations: {
		position: 'back'
	},
	dataLabels: {
		enabled:false
	},
	chart: {
		type: 'bar',
		height: 300
	},
	fill: {
		opacity:1
	},
	plotOptions: {
	},
	series: [{
		name: 'People',
		data: [9,20,30,20,10,20,30,20,10,20,30,20]
	}],
	colors: '#435ebe',
	xaxis: {
		categories: ["Jan","Feb","Mar","Apr","May","Jun","Jul", "Aug","Sep","Oct","Nov","Dec"],
	},
}

var barOptions = {
	series: [
	  {
		name: "Net Profit",
		data: [44, 55, 57, 56, 61, 58, 63, 60, 66],
	  },
	  {
		name: "Revenue",
		data: [76, 85, 101, 98, 87, 105, 91, 114, 94],
	  },
	  {
		name: "Free Cash Flow",
		data: [35, 41, 36, 26, 45, 48, 52, 53, 41],
	  },
	],
	chart: {
	  type: "bar",
	  height: 350,
	},
	plotOptions: {
	  bar: {
		horizontal: false,
		columnWidth: "55%",
		endingShape: "rounded",
	  },
	},
	dataLabels: {
	  enabled: false,
	},
	stroke: {
	  show: true,
	  width: 2,
	  colors: ["transparent"],
	},
	xaxis: {
	  categories: ["Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct"],
	},
	yaxis: {
	  title: {
		text: "$ (thousands)",
	  },
	},
	fill: {
	  opacity: 1,
	},
	tooltip: {
	  y: {
		formatter: function(val) {
		  return "$ " + val + " thousands";
		},
	  },
	},
  };

var chartProfileVisit = new ApexCharts(document.querySelector("#chart-profile-visit"), optionsProfileVisit);
var bar = new ApexCharts(document.querySelector("#bar"), barOptions);

chartProfileVisit.render();
bar.render();