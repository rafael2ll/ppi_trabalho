INSERT INTO pessoa (nome, sexo, email, telefone, cep, endereco, cidade, estado)
VALUES ('Fulano 1', 'M', 'fulano1@email.com', '5534998985656', '38408119', 'Rua K', 'K City', 'K'),
       ('Fulano 2', 'F', 'fulano2@email.com', '5534998985656', '38408118', 'Rua L', 'K City', 'K'),
       ('Fulano 3', 'F', 'fulano3@email.com', '5534998985656', '38408117', 'Rua M', 'K City', 'K'),
       ('Fulano 4', 'M', 'fulano4@email.com', '5534998985656', '38408116', 'Rua N', 'K City', 'K'),
       ('Fulano 5', 'F', 'fulano5@email.com', '5534998985656', '38408115', 'Rua O', 'K City', 'K'),
       ('Fulano 6', 'M', 'fulano6@email.com', '5534998985656', '38408114', 'Rua P', 'K City', 'K'),
       ('Fulano 7', 'F', 'fulano7@email.com', '5534998985656', '38408113', 'Rua Q', 'K City', 'K'),
       ('Fulano 8', 'M', 'fulano8@email.com', '5534998985656', '38408112', 'Rua R', 'K City', 'K'),
       ('Fulano 9', 'F', 'fulano9@email.com', '5534998985656', '38408111', 'Rua S', 'K City', 'K'),
       ('Fulano 10', 'M', 'fulano10@email.com', '5534998985656', '38408110', 'Rua T', 'K City', 'K'),
       ('Fulano 11', 'F', 'fulano11@email.com', '5534998985656', '38408128', 'Rua U', 'K City', 'K');


INSERT INTO ppi.funcionario (codigo, data_contrato, salario, senha_hash)
VALUES (1, '2021-01-01 00:00:00', 1500.0, '$2y$10$ZShlcb40g.jzC91WCN\\/aBOZvK\\/ggx.qMdf818vVSHeVjJPqKv\\/rr2'),
       (2, '2021-01-01 00:00:00', 2500.0, '$2y$10$ZShlcb40g.jzC91WCN\\/aBOZvK\\/ggx.qMdf818vVSHeVjJPqKv\\/rr2'),
       (3, '2021-01-01 00:00:00', 3500.0, '$2y$10$ZShlcb40g.jzC91WCN\\/aBOZvK\\/ggx.qMdf818vVSHeVjJPqKv\\/rr2'),
       (4, '2020-01-01 00:00:00', 4500.0, '$2y$10$ZShlcb40g.jzC91WCN\\/aBOZvK\\/ggx.qMdf818vVSHeVjJPqKv\\/rr2'),
       (5, '2019-01-01 00:00:00', 5500.0, '$2y$10$ZShlcb40g.jzC91WCN\\/aBOZvK\\/ggx.qMdf818vVSHeVjJPqKv\\/rr2'),
       (6, '2020-01-01 00:00:00', 6500.0, '$2y$10$ZShlcb40g.jzC91WCN\\/aBOZvK\\/ggx.qMdf818vVSHeVjJPqKv\\/rr2');

INSERT INTO ppi.medico (codigo, especialidade, crm)
VALUES (1, 'cardiologia', '000001'),
       (2, 'cardiologia', '000001'),
       (3, 'endocrinologia', '000001'),
       (4, 'pneumologia', '000001'),
       (5, 'cardiologia', '000001');