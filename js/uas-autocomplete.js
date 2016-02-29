$(document).ready(function () {
	//District auto-complete function
	$(function () {
			var districts = [
				"Balaka",
				"Blantyre",
				"Chikhwawa",
				"Chiradzulu",
				"Chitipa",
				"Dedza",
				"Dowa",
				"Kasungu",
				"Machinga",
				"Mangochi",
				"Mchinji",
				"Mtchisi",
				"Mwanza",
				"Mzimba",
				"Neno",
				"Nkhatabay",
				"Nkhotakota",
				"Nsanje",
				"Phalombe",
				"Rumphi",
				"Salima",
				"Thyolo",
				"Tcheu",
				"Lilongwe",
				"Zomba"
			];
			$('#district').autocomplete({
				source: districts
			});
		});	
	//countries auto-complete function
	$(function () {
		var countries = [
    		"SLOVENIA",
    		"SVALBARD AND JAN MAYEN",
    		"SLOVAKIA",
    		"SIERRA LEONE",
    		"SAN MARINO",
    		"SENEGAL",
    		"SOMALIA",
    		"SURINAME",
    		"SAO TOME AND PRINCIPE",
    		"EL SALVADOR",
    		"SYRIAN ARAB REPUBLIC",
    		"SWAZILAND",
    		"TURKS AND CAICOS ISLANDS",
    		"CHAD",
    		"FRENCH SOUTHERN TERRITORIES",
    		"TOGO",
    		"THAILAND",
    		"TAJIKISTAN",
	 		"TOKELAU",
    		"TIMOR-LESTE",
    		"TURKMENISTAN",
    		"TUNISIA",
    		"TONGA",
    		"TURKEY",
    		"TRINIDAD AND TOBAGO",
    		"TUVALU",
    		"TAIWAN, PROVINCE OF CHINA",
    		"TANZANIA, UNITED REPUBLIC OF",
    		"UKRAINE",
    		"UGANDA",
    		"UNITED STATES MINOR OUTLYING ISLANDS",
    		"UNITED STATES",
    		"URUGUAY",
    		"UZBEKISTAN",
    		"HOLY SEE (VATICAN CITY STATE)",
    		"SAINT VINCENT AND THE GRENADINES",
    		"VENEZUELA",
    		"VIRGIN ISLANDS, BRITISH",
    		"VIRGIN ISLANDS",
    		"VIET NAM",
    		"VANUATU",
    		"WALLIS AND FUTUNA",
    		"SAMOA",
    		"MAYOTTE",
    		"SOUTH AFRICA",
    		"ZAMBIA",
    		"ZIMBABWE"
		];
		$('#countries').autocomplete({
				source: countries
			});
	});
});
		