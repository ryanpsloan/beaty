DROP TABLE IF EXISTS job;

CREATE TABLE job(
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  jobId CHAR(64),
  description CHAR(255),
  bricklayerRate CHAR(64),
  bricklayerMP CHAR(64),
  bricklayerM1 CHAR(64),
  foremanRate CHAR(64),
  foremanMP CHAR(64),
  laborRate CHAR(64),
  laborMP CHAR(64),
  laborM1 CHAR(64),
  operatorRate CHAR(64),
  operatorMP CHAR(64),
  operatorM1 CHAR(64),
  beneco BOOLEAN,
  perdiem BOOLEAN,
  PRIMARY KEY(id),
  UNIQUE(jobId),
  INDEX(jobId)
);


INSERT INTO job VALUES(null,"01-1418","Churchrock Elementary",22.85,3.000,0.74,24.85,3.000,15.91,2.125,0.27,29.07,2.580,0.50,FALSE,FALSE);
INSERT INTO job VALUES(null,"01-1425","ABQ Convention Center",22.85,3.000,0.74,24.85,3.000,15.91,2.125,0.27,29.07,2.580,0.50,FALSE,FALSE);
INSERT INTO job VALUES(null,"01-1426","Northeast Elementary",22.85,3.000,0.74,24.85,3.000,15.91,2.125,0.27,29.07,2.580,0.50,FALSE,FALSE);
INSERT INTO job VALUES(null,"01-1504","Jefferson Elementary",22.85,3.000,0.74,24.85,3.000,15.91,2.125,0.27,29.07,2.580,0.50,FALSE,FALSE);
INSERT INTO job VALUES(null,"01-1509","New Zuni Elementary",22.85,6.000,0.74,24.85,6.000,15.91,4.250,0.27,29.07,5.160,0.50,FALSE,TRUE);
INSERT INTO job VALUES(null,"01-1516","Ramah Elementary",25.85,3.000,0.56,27.85,3.000,18.03,2.125,0.56,31.65,2.580,0.56,TRUE,FALSE);
INSERT INTO job VALUES(null,"01-1517","Los Alamos Middle School",22.85,3.000,0.56,24.85,3.000,15.91,2.125,0.56,29.07,2.580,0.56,FALSE,FALSE);
INSERT INTO job VALUES(null,"01-1550","Del Norte Elementary",22.85,6.000,0.56,24.85,6.000,15.91,4.250,0.56,29.07,5.160,0.56,FALSE,TRUE);
INSERT INTO job VALUES(null,"01-1608","Zuni Senior Center",23.32,7.300,0.50,25.32,7.300,17.30,5.400,0.50,21.53,6.000,0.50,FALSE,FALSE);
INSERT INTO job VALUES(null,"01-1614","Farmington HS Bldgs B/C/D",23.32,7.300,0.50,25.32,7.300,17.30,5.400,0.50,21.53,6.000,0.50,FALSE,TRUE);
INSERT INTO job VALUES(null,"01-1628","Rio Rancho Schools",26.97,3.650,0.50,28.97,3.650,20.00,2.700,0.50,24.53,3.000,0.50,TRUE,FALSE);
INSERT INTO job VALUES(null,"02-1404","CO: Lab SW High School",22.85,3.000,0.74,24.85,3.000,15.91,2.125,0.27,29.07,2.580,0.50,FALSE,FALSE);
INSERT INTO job VALUES(null,"02-1423","CNM Westside Stone",22.85,3.000,0.74,24.85,3.000,15.91,2.125,0.27,29.07,2.580,0.50,FALSE,FALSE);
INSERT INTO job VALUES(null,"02-1500","AHSB Baseball Dugouts",22.85,3.000,0.56,24.85,3.000,15.91,2.125,0.56,29.07,2.580,0.56,FALSE,FALSE);
INSERT INTO job VALUES(null,"02-1505","Rio Grande Academy",22.85,3.000,0.74,24.85,3.000,15.91,2.125,0.27,29.07,2.580,0.50,FALSE,FALSE);
INSERT INTO job VALUES(null,"02-1507","Los Alamos Teen Renov",22.85,3.000,0.74,24.85,3.000,15.91,2.125,0.27,29.07,2.580,0.50,FALSE,FALSE);
INSERT INTO job VALUES(null,"02-1508","Career Enrichment Center",22.85,3.000,0.74,24.85,3.000,15.91,2.125,0.50,29.07,2.580,0.50,FALSE,FALSE);
INSERT INTO job VALUES(null,"02-1511","UNM Chemistry Bldg",22.85,3.000,0.74,24.85,3.000,15.91,2.125,0.27,29.07,2.580,0.50,FALSE,FALSE);
INSERT INTO job VALUES(null,"02-1513","Ramirez Thomas Elementary",22.85,3.000,0.00,24.85,3.000,15.91,2.125,0.56,29.07,2.580,0.56,FALSE,FALSE);
INSERT INTO job VALUES(null,"02-1522","SF National Cemetery",19.51,0.00,0.00,21.51,0.00,17.06,2.430,0.00,21.58,3.000,0.00,FALSE,FALSE);
INSERT INTO job VALUES(null,"02-1527","NMHU Trolley Barn",22.85,3.000,0.56,24.85,3.000,15.91,2.125,0.56,29.07,2.580,0.56,FALSE,FALSE);
INSERT INTO job VALUES(null,"02-1529","KAFB Bulk Fuels Facility",23.32,3.665,0.00,25.32,3.665,17.06,2.430,0.00,21.58,3.000,0.00,FALSE,FALSE);
INSERT INTO job VALUES(null,"02-1531","LANL TA-50",20.80,5.100,0.00,22.80,5.100,17.06,4.860,0.00,20.86,4.600,0.00,FALSE,TRUE);
INSERT INTO job VALUES(null,"02-1533","Holloman Medical Center",20.36,5.740,0.00,22.36,5.740,13.77,4.350,0.00,21.13,4.830,0.00,FALSE,TRUE);
INSERT INTO job VALUES(null,"02-1538","NMSD Site Improvements Phase 2",17.74,0.260,0.00,19.74,0.260,14.43,0.350,0.00,15.94,0.260,0.00,FALSE,TRUE);
INSERT INTO job VALUES(null,"02-1542","Mountain View Elementary",25.85,3.000,0.56,27.85,3.000,18.03,2.125,0.56,31.65,2.580,0.56,TRUE,FALSE);
INSERT INTO job VALUES(null,"02-1607","CNM SMITH BRASHER HALL",26.97,3.650,0.50,28.97,3.650,20.00,2.700,0.50,24.53,3.000,0.50,TRUE,FALSE);
INSERT INTO job VALUES(null,"02-1600","VA INPATIENT HEALTH CENTER",26.98,3.665,0.00,28.98,3.665,19.49,2.430,0.00,24.58,3.000,0.00,TRUE,FALSE);
INSERT INTO job VALUES(null,"02-1549","KAFB Dog Kennels",26.97,3.650,0.00,28.97,3.650,19.49,2.430,0.00,24.58,3.000,0.00,TRUE,FALSE);
INSERT INTO job VALUES(null,"02-1606","West Las Vegas MS Renov",23.32,7.300,0.56,25.32,7.300,17.30,5.400,0.56,21.53,6.000,0.56,FALSE,TRUE);
INSERT INTO job VALUES(null,"02-1624","VALLEY HIGH SCHOOL",25.85,3.000,0.56,27.85,3.000,18.03,2.125,0.56,31.65,2.580,0.56,TRUE,FALSE);
INSERT INTO job VALUES(null,"02-1615","Onate classroom add",26.97,3.650,0.50,28.97,3.650,20.00,2.700,0.50,24.53,3.000,0.50,TRUE,FALSE);
INSERT INTO job VALUES(null,"02-1601","KAFB Critical Comm Fac",26.98,3.665,0.00,28.98,3.665,19.49,2.430,0.00,24.58,3.000,0.00,FALSE,FALSE);
INSERT INTO job VALUES(null,"02-1630","ABQ RIDE ART SEG 1",27.34,4.020,0.00,29.34,4.020,15.55,2.650,0.00,20.52,3.080,0.00,TRUE,FALSE);
INSERT INTO job VALUES(null,"02-1632","ABQ RIDE ART SEG 2",27.34,4.020,0.00,29.34,4.020,15.55,2.650,0.00,20.52,3.080,0.00,TRUE,FALSE);
INSERT INTO job VALUES(null,"02-1633","ABQ RIDE ART SEG 3",27.34,4.020,0.00,29.34,4.020,15.55,2.650,0.00,20.52,3.080,0.00,TRUE,FALSE);
INSERT INTO job VALUES(null,"02-1635","ABQ RIDE ART SEG 4",27.34,4.020,0.00,29.34,4.020,15.55,2.650,0.00,20.52,3.080,0.00,TRUE,FALSE);
INSERT INTO job VALUES(null,"02-1637","IAIA Multi-Purpose",26.97,3.650,0.50,28.97,3.650,20.00,2.700,0.50,24.53,3.000,0.50,TRUE,FALSE);
INSERT INTO job VALUES(null,"03-1422","Broadmoor Elementary",22.85,3.000,0.74,24.85,3.000,15.91,2.125,0.27,29.07,2.580,0.50,FALSE,FALSE);
INSERT INTO job VALUES(null,"03-1501","FY14 144-Person Dorms",20.36,2.870,0.00,22.36,2.870,13.77,2.175,0.00,21.13,2.415,0.00,FALSE,FALSE);
INSERT INTO job VALUES(null,"03-1515","CAFB Fy13",20.36,2.870,0.00,22.36,2.870,13.77,2.175,0.00,21.13,2.415,0.00,FALSE,FALSE);
INSERT INTO job VALUES(null,"03-1519","NMJC Pannell Library",22.85,3.000,0.56,24.85,3.000,15.91,2.125,0.56,29.07,2.580,0.56,FALSE,FALSE);
INSERT INTO job VALUES(null,"03-1524","Desert Willow Elementary",22.85,3.000,0.56,24.85,3.000,15.91,2.125,0.56,29.07,2.580,0.56,FALSE,FALSE);
INSERT INTO job VALUES(null,"03-1534","CAFB Youth Center Annex",20.36,2.870,0.00,22.36,2.870,13.77,2.175,0.00,21.13,2.415,0.00,FALSE,FALSE);
INSERT INTO job VALUES(null,"03-1535","CAFB Medical Center",20.36,5.740,0.00,22.36,5.740,13.77,4.350,0.00,21.13,4.830,0.00,FALSE,TRUE);
INSERT INTO job VALUES(null,"03-1540","Fort Stanton Cemetery",22.85,6.000,0.56,24.85,6.000,15.91,4.250,0.56,29.07,5.160,0.56,FALSE,TRUE);
INSERT INTO job VALUES(null,"03-1543","Parkview Literacy Center",22.85,6.000,0.56,24.85,6.000,15.91,4.250,0.56,29.07,5.160,0.56,FALSE,TRUE);
INSERT INTO job VALUES(null,"03-1546","Jett Hall",22.85,6.000,0.56,24.85,6.000,15.91,4.250,0.56,29.07,5.160,0.56,FALSE,TRUE);
INSERT INTO job VALUES(null,"03-1603","The New Deming High School",23.32,7.300,0.56,25.32,7.300,17.30,5.400,0.56,21.53,6.000,0.56,FALSE,TRUE);
INSERT INTO job VALUES(null,"03-1622","Hobbs Health Wellness",23.32,7.300,0.50,25.32,7.300,17.30,5.400,0.50,21.53,6.000,0.50,FALSE,TRUE);
INSERT INTO job VALUES(null,"03-1625","San Antonio Elementary",23.32,7.300,0.50,25.32,7.300,17.30,5.400,0.50,21.53,6.000,0.50,FALSE,TRUE);
