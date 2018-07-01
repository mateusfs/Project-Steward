function AlertaError(titulo, msn)
{
	var not = $.Notify({
		style: {background: '#D95C5C', color: 'white'},
		caption: titulo,
		content: msn,
	});
	not.clear();
	not.close(20000);
};

function AlertaSucesso(titulo, msn)
{
	var not = $.Notify({
		style: {background: '#60a917', color: 'white'},
		caption: titulo,
		content: msn,
	});
	not.clear();
	not.close(20000);
};

function AlertaInfo(titulo, msn)
{
	var not = $.Notify({
		style: {background: '#1ba1e2', color: 'white'},
		caption: titulo,
		content: msn,
	});
	not.clear();
	not.close(20000);
};


function AlertaCor(cor, titulo, msn)
{
	var not = $.Notify({
		style: {background: cor, color: 'white'},
		caption: titulo,
		content: msn,
	});
	not.clear();
	not.close(20000);
};
