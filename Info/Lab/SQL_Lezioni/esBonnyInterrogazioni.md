[File esercizi](file:///C:/Users/ercoo/Downloads/SQL.pdf) [Database + SQL editor](https://www.w3schools.com/sql/trysql.asp?filename=trysql_select_all) [Screen DB](file:///C:/Users/ercoo/Pictures/Screenshots/Screenshot%202026-02-28%20092616.png)



1. *Mostra l’elenco dei clienti tedeschi:*
   SELECT \* FROM Customers WHERE Country='Germany';
2. *Mostra l’elenco delle nazioni dei clienti*:
   SELECT Country FROM Customers GROUP BY Country; ------ SELECT DISTINCT Country FROM Customers;
3. *Mostra l’elenco dei clienti nordamericani*:
   SELECT \* FROM CUSTOMERS WHERE Country='Canada' OR Country='USA';
4. *Mostra l’elenco dei clienti al di fuori degli USA*:
   SELECT \* FROM CUSTOMERS WHERE Country!='USA';
5. *Quanti sono in tutto i clienti*:
   SELECT COUNT(\*) AS 'Numero Clienti' FROM Customers;
6. *Qual è l’elenco delle nazioni da cui provengono i clienti*:
   SELECT Country FROM Customers GROUP BY Country; ------ SELECT DISTINCT Country FROM Customers;
7. *Da quante nazioni diverse provengono i clienti*:
   SELECT COUNT(DISTINCT Country) AS 'Numero Nazioni' FROM Customers;
8. *Qual è il prezzo medio dei prodotti in vendita*:
   SELECT AVG(Price) AS 'Prezzo Medio' FROM Products;
9. *Quanti prodotti hanno un importo tra i 50 e i 100*:
   SELECT COUNT(\*) AS 'Prodotti fra 50 e 100' FROM Products WHERE Price BETWEEN 50 AND 100;
10. *Mostra il cognome e il nome degli impiegati in ordine alfabetico*:
    SELECT LastName, FirstName FROM Employees ORDER BY LastName;
11. *Mostra gli ordini dal più al meno recente*:
    SELECT \* FROM Orders ORDER BY OrderDate DESC;
12. *Mostra solo gli ultimi 3 ordini effettuati*:
    SELECT TOP 3 \* FROM Orders ORDER BY OrderDate DESC;
13. *Mostra l’elenco dei prodotti in ordine alfabetico dal 21° al 30°*:
    SELECT \* FROM Orders ORDER BY OrderDate DESC LIMIT 10, 20;
14. *Quali prodotti contengono “lager” nel nome*:
    SELECT \* FROM Products WHERE ProductName LIKE '%lager%';
15. *Qual è la data di nascita dell’impiegato più vecchio*:
    SELECT TOP 1 BirthDate AS 'Data di nascita' FROM Employees ORDER BY BirthDate;
16. *Qual è il nome e il cognome dell’impiegato più vecchio*:
    SELECT TOP 1 FirstName, LastName FROM Employees ORDER BY BirthDate;
17. *Mostra l’elenco dei prodotti aventi un prezzo superiore alla media, ordinati per prezzo crescente*:
    SELECT \* FROM Products WHERE Price>(SELECT AVG(Price) FROM Products) ORDER BY Price;
18. *Quanti ordini ha fatto ‘Wartian Herkku’*:
    SELECT COUNT(\*) AS 'Ordini di Wartian Herkku' FROM Orders AS o
    INNER JOIN Customers AS c ON c.CustomerName='Wartian Herkku' AND o.CustomerID=c.CustomerID;
19. *Mostra i nomi di tutti i prodotti e della loro categoria*:
    SELECT p.ProductName, c.CategoryName FROM Products AS p INNER JOIN Categories AS c ON p.CategoryID=c.CategoryID;
20. *Visualizza la tabella degli ordini come mostrato in figura* \[(IMG)](C:\\Users\\ercoo\\Pictures\\Screenshots\\Screenshot 2026-02-28 100310.png):
    SELECT o.OrderID AS '# Ordine', c.CustomerName AS 'Cliente', e.LastName AS 'Impiegato', s.ShipperName AS 'Corriere' FROM Orders AS o
    INNER JOIN Customers AS c ON o.CustomerID=c.CustomerID
    INNER JOIN Employees AS e ON o.EmployeeID=e.EmployeeID
    INNER JOIN Shippers AS s ON o.ShipperID=s.ShipperID;
21. *Mostra gli impiegati che sanno parlare francese (lo si deduce dalle note)*:
    SELECT \* FROM Employees WHERE Notes LIKE '%French%';
22. *Visualizza la tabella dei prodotti come mostrato in figura* \[(IMG)](C:\\Users\\ercoo\\Pictures\\Screenshots\\Screenshot 2026-02-28 110442.png):
    SELECT p.ProductName AS 'Nome prodotto', c.CategoryName AS Categoria, su.SupplierName AS Fornitore, p.Price AS Prezzo FROM Products AS p
    INNER JOIN Suppliers AS su ON p.SupplierID=su.SupplierID
    INNER JOIN Categories AS c ON p.CategoryID=c.CategoryID;
23. *Visualizza le righe dell’ordine numero 10309, mostrando per ciascuna il nome del prodotto, il prezzo, la quantità e il totale di riga*:
    SELECT p.ProductName AS Prodotto, p.Price AS 'Prezzo Unitario', od.Quantity AS 'Quantità', (p.Price\*od.Quantity) AS Totale FROM OrderDetails AS od
    INNER JOIN Products AS p ON od.ProductID=p.ProductID
    INNER JOIN Orders AS o ON od.OrderID=o.OrderID WHERE o.OrderID=10309;
24. *Calcola l’importo totale dell’ordine numero 10309*:
    SELECT SUM(p.Price\*od.Quantity) AS 'Totale ordine' FROM OrderDetails AS od
    INNER JOIN Products AS p ON od.ProductID=p.ProductID
    INNER JOIN Orders AS o ON od.OrderID=o.OrderID WHERE o.OrderID=10309;
25. *Qual è la somma degli importi di tutti gli ordini*:
    SELECT SUM(p.Price\*od.Quantity) AS 'Importo totale' FROM OrderDetails AS od
    INNER JOIN Products AS p ON od.ProductID=p.ProductID
    INNER JOIN Orders AS o ON od.OrderID=o.OrderID;
26. *Mostra per ogni ordine il corrispondente importo totale*:
    SELECT od.OrderID AS 'Numero ordine', SUM(p.Price\*od.Quantity) AS 'Importo totale' FROM OrderDetails AS od
    INNER JOIN Products AS p ON od.ProductID=p.ProductID
    INNER JOIN Orders AS o ON od.OrderID=o.OrderID
    GROUP BY od.OrderID;
27. *Qual è l’importo medio degli ordini*:
    SELECT AVG(importo) AS 'Media ordini' FROM (
    SELECT SUM(p.Price\*od.Quantity) AS importo FROM OrderDetails AS od
    INNER JOIN Products AS p ON od.ProductID=p.ProductID
    GROUP BY od.OrderID) AS booooh;
28. *Quanti prodotti sono di categoria ‘seafood’*:
    SELECT COUNT(\*) AS '# Prodotti seafood' FROM (
    SELECT p.ProductID, c.CategoryName FROM Products AS p
    INNER JOIN Categories AS c ON p.CategoryID=c.CategoryID
    WHERE c.CategoryName='seafood') AS aus;
29. *Mostra la nazione e il numero di clienti di quella nazione. Le nazioni devono essere ordinate per numero di clienti*:
    SELECT Country AS 'Nazione', COUNT(\*) as 'Numero Clienti' FROM Customers GROUP BY Country ORDER BY 'Numero Clienti' DESC;
30. *Qual è il nome del prodotto che è stato acquistato in maggior quantità*:
    SELECT TOP 1 p.ProductName, SUM(od.Quantity) AS 'Quantità ordinata' FROM OrderDetails AS od
    INNER JOIN Products AS p ON od.ProductID = p.ProductID
    GROUP BY p.ProductID, p.ProductName
    ORDER BY SUM(od.Quantity) DESC;
31. *Qual è il nome dei primi tre prodotti che hanno generato il maggior incasso*:
    SELECT TOP 3 p.ProductName, SUM(od.Quantity) AS 'Quantità ordinata', MAX(p.Price) AS 'Prezzo unitario', SUM(od.Quantity\*p.Price) AS Incasso
    FROM Products AS p
    INNER JOIN OrderDetails AS od ON p.ProductID=od.ProductID
    GROUP BY p.ProductID, p.ProductName
    ORDER BY SUM(od.Quantity\*p.Price) DESC;
32. *Mostra i clienti che non hanno ancora fatto un ordine*:
    SELECT c.CustomerID, c.CustomerName, c.ContactName, c.Address, c.City, c.PostalCode, c.Country
    FROM Customers AS c
    LEFT JOIN Orders AS o ON c.CustomerID = o.CustomerID
    WHERE o.OrderID IS NULL;
33. *Esistono dei Fornitori che non hanno fornito alcun prodotto*:
    aaaa
34. *Quanto ha speso in totale ‘Wartian Herkku’ per tutti i suoi ordini*:
    aaaaa

aaaaaauuuurrraaaa

