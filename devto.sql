--
-- PostgreSQL database dump
--

\restrict N8t3bZ8f09fWk6YumEHJhhVOVw4WgXhRPUuF5xSdhD3sEY1AlgfJGjJxCbn2Zgv

-- Dumped from database version 18.4 (Ubuntu 18.4-0ubuntu0.26.04.1)
-- Dumped by pg_dump version 18.4 (Ubuntu 18.4-0ubuntu0.26.04.1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET transaction_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: navigation; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.navigation (
    id bigint NOT NULL,
    title character varying(100) NOT NULL,
    icon character varying(100) NOT NULL,
    url character varying(255) NOT NULL,
    section character varying(50) DEFAULT 'main'::character varying NOT NULL,
    display_order integer DEFAULT 0 NOT NULL,
    is_active boolean DEFAULT true NOT NULL,
    created_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP
);


ALTER TABLE public.navigation OWNER TO postgres;

--
-- Name: navigation_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.navigation_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.navigation_id_seq OWNER TO postgres;

--
-- Name: navigation_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.navigation_id_seq OWNED BY public.navigation.id;


--
-- Name: posts; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.posts (
    id bigint NOT NULL,
    title character varying,
    body text,
    created_by bigint,
    created_at timestamp without time zone DEFAULT now(),
    images text
);


ALTER TABLE public.posts OWNER TO postgres;

--
-- Name: posts_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.posts_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.posts_id_seq OWNER TO postgres;

--
-- Name: posts_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.posts_id_seq OWNED BY public.posts.id;


--
-- Name: navigation id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.navigation ALTER COLUMN id SET DEFAULT nextval('public.navigation_id_seq'::regclass);


--
-- Name: posts id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.posts ALTER COLUMN id SET DEFAULT nextval('public.posts_id_seq'::regclass);


--
-- Data for Name: navigation; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.navigation (id, title, icon, url, section, display_order, is_active, created_at, updated_at) FROM stdin;
1	Home	bi-house-door	/	main	1	t	2026-07-08 09:19:56.045395	2026-07-08 09:19:56.045395
2	DEV Challenges	bi-trophy	/challenges	main	2	t	2026-07-08 09:19:56.045395	2026-07-08 09:19:56.045395
3	DEV++	bi-plus-circle	/dev-plus	main	3	t	2026-07-08 09:19:56.045395	2026-07-08 09:19:56.045395
4	DEV Education Tracks	bi-mortarboard	/education	main	4	t	2026-07-08 09:19:56.045395	2026-07-08 09:19:56.045395
5	DEV Help	bi-question-circle	/help	main	5	t	2026-07-08 09:19:56.045395	2026-07-08 09:19:56.045395
6	Advertise on DEV	bi-megaphone	/advertise	main	6	t	2026-07-08 09:19:56.045395	2026-07-08 09:19:56.045395
7	Organization Accounts	bi-building	/organizations	main	7	t	2026-07-08 09:19:56.045395	2026-07-08 09:19:56.045395
8	About	bi-info-circle	/about	main	8	t	2026-07-08 09:19:56.045395	2026-07-08 09:19:56.045395
9	Contact	bi-envelope	/contact	main	9	t	2026-07-08 09:19:56.045395	2026-07-08 09:19:56.045395
10	Free Postgres Database	bi-database	/postgres	main	10	t	2026-07-08 09:19:56.045395	2026-07-08 09:19:56.045395
11	DEV Shop	bi-bag	/shop	main	11	t	2026-07-08 09:19:56.045395	2026-07-08 09:19:56.045395
12	MLH	bi-code-slash	/mlh	main	12	t	2026-07-08 09:19:56.045395	2026-07-08 09:19:56.045395
13	Trends	bi-graph-up-arrow	/trending	main	13	t	2026-07-08 09:19:56.045395	2026-07-08 09:19:56.045395
14	Code of Conduct	bi-file-text	/code-of-conduct	other	1	t	2026-07-08 09:19:56.045395	2026-07-08 09:19:56.045395
15	Privacy Policy	bi-shield-check	/privacy	other	2	t	2026-07-08 09:19:56.045395	2026-07-08 09:19:56.045395
16	Terms of Use	bi-journal-check	/terms	other	3	t	2026-07-08 09:19:56.045395	2026-07-08 09:19:56.045395
\.


--
-- Data for Name: posts; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.posts (id, title, body, created_by, created_at, images) FROM stdin;
12	elon musk , am the richest man	sufewiruwgwireuhvipuwrpijvbblwkdjbglvkejdfbliuitlrwi	\N	2026-07-07 14:01:10.164833	https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRdv8lcN13BQMED9YKw6k0g0dq2KoY1kDiTcNPAyHfjVAbGGSHSwD9dvlybkfsgu0NHqouSyRHuNF7CEVSoniZ3LoIgZBS82TWvGFeP3chvdg&s=10
1	Getting Started with Yii2 Framework	Yii2 is a high-performance PHP framework perfect for modern web development. In this comprehensive guide, we will walk through installing Yii2, understanding the MVC pattern, creating your first controller, and building a complete CRUD application.	1	2026-01-15 10:30:00	https://images.unsplash.com/photo-1516321318423-f06f85e504b3
2	10 JavaScript Array Methods Every Developer Should Know	JavaScript arrays are incredibly powerful, and knowing the right methods can dramatically improve your code quality. Explore map(), filter(), reduce(), forEach(), find(), some(), every(), sort(), concat(), and slice() with practical examples.	2	2026-01-18 14:20:00	https://images.unsplash.com/photo-1498050108023-c5249f4df085
3	How to Ace Your Technical Interview	Technical interviews can be daunting, but with the right preparation, you can excel. This guide covers everything from resume optimization to behavioral questions, coding challenges, and system design interviews.	1	2026-01-20 09:15:00	https://images.unsplash.com/photo-1517694712202-14dd9538aa97
4	5 CSS Tricks to Improve Website Performance	CSS performance is often overlooked, but it can significantly impact your website speed. Learn about CSS containment, critical CSS delivery, avoiding expensive selectors, using will-change sparingly, and minimizing reflows and repaints.	3	2026-01-22 16:45:00	https://images.unsplash.com/photo-1518770660439-4636190af475
6	Building a RESTful API with PHP and Slim Framework	Slim is a micro-framework perfect for building APIs. This tutorial covers building a complete RESTful API with CRUD operations, authentication using JWT, middleware for request validation, and proper error handling.	1	2026-01-28 13:30:00	https://images.unsplash.com/photo-1555949963-aa79dcee981c
7	Microservices vs Monolith: Making the Right Choice	The microservices vs monolith debate continues to divide development teams. Explore the benefits and challenges of each approach including deployment complexity, team organization, scalability, and cost.	3	2026-02-01 08:00:00	https://images.unsplash.com/photo-1504639725590-34d0984388bd
8	10 Productivity Hacks for Developers	From keyboard shortcuts and IDE optimization to the Pomodoro technique, code snippets, and automation, these productivity hacks have been tested by thousands of developers worldwide.	2	2026-02-03 15:20:00	https://images.unsplash.com/photo-1515879218367-8466d910aaa4
9	Web Application Security: Essential Best Practices	Security should be a top priority in every web application. This guide covers the OWASP Top 10 vulnerabilities including SQL injection, XSS, CSRF, authentication security, and data encryption.	1	2026-02-05 10:00:00	https://images.unsplash.com/photo-1563986768609-322da13575f3
10	Docker for Beginners: A Complete Tutorial	Docker has revolutionized how we develop, ship, and deploy applications. Learn Docker fundamentals, basic commands, creating Dockerfiles, building images, and managing containers.	3	2026-02-07 18:45:00	https://images.unsplash.com/photo-1605745341112-85968b19335b
11	kato muyomba	kjerkjrejwkjekj bk gktjbgktjrb 	3	2026-07-07 10:24:36.150502	https://images.unsplash.com/photo-1516321497487-e288fb19713f
13	President Yoweri Museveni Speech	President Yoweri Kaguta Museveni has reaffirmed the government's commitment to ensuring Uganda successfully co-hosts the 2027 Africa Cup of Nations (AFCON), pledging full financial backing, accelerated infrastructure development, and enhanced regional cooperation to deliver the continent's biggest football tournament.\r\n\r\n \r\n\r\nDuring a high-level meeting with the AFCON Local Organising Committee at State House, Entebbe on Wednesday, July 1, 2026, President Museveni assured officials that the government would provide all the necessary funding and technical support required to meet the strict timelines set by the Confederation of African Football (CAF).\r\n\r\nUganda will jointly host the 2027 AFCON finals alongside Kenya and Tanzania under the East African "Pamoja" initiative, marking the first time the tournament will be staged in the region.\r\n\r\nOne of the major outcomes of the meeting was President Museveni's endorsement of a proposal to introduce a common East African entry visa for the duration of the tournament. The proposed visa would allow football fans, tourists, officials, and participating teams to move freely between Uganda, Kenya, and Tanzania for four months without requiring separate entry permits.\r\n\r\n“This is common sense. I support it,” President Museveni said, directing that discussions be initiated with his counterparts in Kenya and Tanzania to make the arrangement possible before the tournament.	\N	2026-07-07 14:32:23.673632	https://yowerikmuseveni.com/media/summernote_uploads/2026/07/President_Museveni_Meeting_With_AFCON_Local_Organising_Commi_4y1eL1t.webp
\.


--
-- Name: navigation_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.navigation_id_seq', 16, true);


--
-- Name: posts_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.posts_id_seq', 13, true);


--
-- Name: navigation navigation_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.navigation
    ADD CONSTRAINT navigation_pkey PRIMARY KEY (id);


--
-- Name: posts posts_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.posts
    ADD CONSTRAINT posts_pk PRIMARY KEY (id);


--
-- PostgreSQL database dump complete
--

\unrestrict N8t3bZ8f09fWk6YumEHJhhVOVw4WgXhRPUuF5xSdhD3sEY1AlgfJGjJxCbn2Zgv

