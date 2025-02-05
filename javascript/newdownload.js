
document.addEventListener('DOMContentLoaded', function() {
    const selectElement = document.getElementById('downloadFormat');
    
    selectElement.addEventListener('change', function(event) {
        const selectedOption = selectElement.options[selectElement.selectedIndex];
        if (selectedOption.value) {
            downloadFile(selectedOption.value);
            selectElement.selectedIndex = 0; // Reset to default "Download"
        }
    });
});

function getFilteredRows() {
    // Fetch only visible rows (not hidden) from the table
    const rows = Array.from(document.querySelectorAll('#loanTableBody tr'));
    return rows.filter(row => row.style.display !== 'none'); // Only visible rows
}

function downloadFile(format) {
    const rows = getFilteredRows();

    if (rows.length === 0) {
        alert('No visible data to download.');
        return;
    }

    const data = rows.map(row => {
        const cells = row.querySelectorAll('td');
        return Array.from(cells).map(cell => cell.textContent.trim());
    });

    switch (format) {
        case 'csv':
            downloadCSV(data);
            break;
        case 'pdf':
            downloadPDF(data);
            break;
        case 'excel':
            downloadExcel(data);
            break;
        case 'doc':
            downloadDOC(data);
            break;
        default:
            alert('Invalid format selected');
    }
}

function downloadCSV(data) {
    const headers = ['Loan ID', 'Client Name', 'Phone', 'Loan Amount', 'Overdue', 'Loan Type', 'Branch', 'Loan Officer']; // Table headers
    const csvContent = "data:text/csv;charset=utf-8," 
        + headers.join(",") + "\n" // Headers
        + data.map(e => e.join(",")).join("\n"); // Data

    const encodedUri = encodeURI(csvContent);
    const link = document.createElement("a");
    link.setAttribute("href", encodedUri);
    link.setAttribute("download", "filtered_data.csv");
    document.body.appendChild(link);

    link.click();
    document.body.removeChild(link);
}

function downloadPDF(data) {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();

    // Prepare headers and rows
    const headers = ['Loan ID', 'Client Name', 'Phone', 'Loan Amount', 'Overdue', 'Loan Type', 'Branch', 'Loan Officer']; // Table headers

    // Use autoTable to generate the table
    doc.autoTable({
        head: [headers],
        body: data,
        styles: { font: "helvetica", fontSize: 10 }
    });

    // Save the PDF
    doc.save('filtered_data.pdf');
}

function downloadExcel(data) {
    // Prepare Excel sheet with headers
    const ws = XLSX.utils.aoa_to_sheet([ // Adding headers and data
        ['Loan ID', 'Client Name', 'Phone', 'Loan Amount', 'Overdue', 'Loan Type', 'Branch', 'Loan Officer'],
        ...data
    ]);

    const wb = XLSX.utils.book_new();
    XLSX.utils.book_append_sheet(wb, ws, "Sheet1");
    XLSX.writeFile(wb, "filtered_data.xlsx");
}

function downloadDOC(data) {
    // Prepare DOC content with headers
    const doc = new docx.Document({
        sections: [{
            properties: {},
            children: [
                new docx.Paragraph(
                    new docx.TextRun({ text: 'Loan Data', bold: true })
                ),
                new docx.Paragraph(
                    new docx.TextRun({ text: 'Loan ID, Client Name, Phone, Loan Amount, Overdue, Loan Type, Branch, Loan Officer', bold: true })
                ),
                ...data.map(item => new docx.Paragraph(
                    new docx.TextRun({ text: item.join(", "), bold: false })
                ))
            ],
        }],
    });

    docx.Packer.toBlob(doc).then(blob => {
        const link = document.createElement("a");
        link.href = URL.createObjectURL(blob);
        link.download = "filtered_data.docx";
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }).catch(err => console.log(err));
}

