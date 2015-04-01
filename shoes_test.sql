--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: brands; Type: TABLE; Schema: public; Owner: Kyle; Tablespace: 
--

CREATE TABLE brands (
    id integer NOT NULL,
    brand_name character varying
);


ALTER TABLE brands OWNER TO "Kyle";

--
-- Name: brands_id_seq; Type: SEQUENCE; Schema: public; Owner: Kyle
--

CREATE SEQUENCE brands_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE brands_id_seq OWNER TO "Kyle";

--
-- Name: brands_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: Kyle
--

ALTER SEQUENCE brands_id_seq OWNED BY brands.id;


--
-- Name: brands_stores; Type: TABLE; Schema: public; Owner: Kyle; Tablespace: 
--

CREATE TABLE brands_stores (
    id integer NOT NULL,
    store_id integer,
    brand_id integer
);


ALTER TABLE brands_stores OWNER TO "Kyle";

--
-- Name: stores; Type: TABLE; Schema: public; Owner: Kyle; Tablespace: 
--

CREATE TABLE stores (
    id integer NOT NULL,
    name character varying
);


ALTER TABLE stores OWNER TO "Kyle";

--
-- Name: stores_brands_id_seq; Type: SEQUENCE; Schema: public; Owner: Kyle
--

CREATE SEQUENCE stores_brands_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE stores_brands_id_seq OWNER TO "Kyle";

--
-- Name: stores_brands_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: Kyle
--

ALTER SEQUENCE stores_brands_id_seq OWNED BY brands_stores.id;


--
-- Name: stores_id_seq; Type: SEQUENCE; Schema: public; Owner: Kyle
--

CREATE SEQUENCE stores_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE stores_id_seq OWNER TO "Kyle";

--
-- Name: stores_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: Kyle
--

ALTER SEQUENCE stores_id_seq OWNED BY stores.id;


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: Kyle
--

ALTER TABLE ONLY brands ALTER COLUMN id SET DEFAULT nextval('brands_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: Kyle
--

ALTER TABLE ONLY brands_stores ALTER COLUMN id SET DEFAULT nextval('stores_brands_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: Kyle
--

ALTER TABLE ONLY stores ALTER COLUMN id SET DEFAULT nextval('stores_id_seq'::regclass);


--
-- Data for Name: brands; Type: TABLE DATA; Schema: public; Owner: Kyle
--

COPY brands (id, brand_name) FROM stdin;
22	Puma
23	Nike
24	Addidas
25	uFO
\.


--
-- Name: brands_id_seq; Type: SEQUENCE SET; Schema: public; Owner: Kyle
--

SELECT pg_catalog.setval('brands_id_seq', 25, true);


--
-- Data for Name: brands_stores; Type: TABLE DATA; Schema: public; Owner: Kyle
--

COPY brands_stores (id, store_id, brand_id) FROM stdin;
1	6	1
2	5	2
3	5	3
4	5	10
5	5	11
6	5	12
7	13	11
8	14	11
9	15	11
10	18	16
11	19	16
12	14	16
13	15	18
14	17	21
15	20	20
16	21	20
17	19	20
18	18	20
19	23	22
20	23	23
21	23	24
22	24	23
23	25	23
24	27	25
25	27	25
\.


--
-- Data for Name: stores; Type: TABLE DATA; Schema: public; Owner: Kyle
--

COPY stores (id, name) FROM stdin;
27	Name
\.


--
-- Name: stores_brands_id_seq; Type: SEQUENCE SET; Schema: public; Owner: Kyle
--

SELECT pg_catalog.setval('stores_brands_id_seq', 25, true);


--
-- Name: stores_id_seq; Type: SEQUENCE SET; Schema: public; Owner: Kyle
--

SELECT pg_catalog.setval('stores_id_seq', 27, true);


--
-- Name: brands_pkey; Type: CONSTRAINT; Schema: public; Owner: Kyle; Tablespace: 
--

ALTER TABLE ONLY brands
    ADD CONSTRAINT brands_pkey PRIMARY KEY (id);


--
-- Name: stores_brands_pkey; Type: CONSTRAINT; Schema: public; Owner: Kyle; Tablespace: 
--

ALTER TABLE ONLY brands_stores
    ADD CONSTRAINT stores_brands_pkey PRIMARY KEY (id);


--
-- Name: stores_pkey; Type: CONSTRAINT; Schema: public; Owner: Kyle; Tablespace: 
--

ALTER TABLE ONLY stores
    ADD CONSTRAINT stores_pkey PRIMARY KEY (id);


--
-- Name: public; Type: ACL; Schema: -; Owner: Kyle
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM "Kyle";
GRANT ALL ON SCHEMA public TO "Kyle";
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

