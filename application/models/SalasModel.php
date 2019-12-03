<?php

class SalasModel extends CI_Model {
    public function set_sala($id = 0, $data) {
        if ($id == 0) {
            $this->db->insert('salas', $data);
            return $this->db->insert_id();
        } else {
            $this->db->where('id', $id);
            return $this->db->update('salas', $data);
        }
    }

    public function get_salas($text, $limit, $offset) {
        return $this->db->query('
            SELECT disciplinas.cod AS disci_cod, disciplinas.nome AS disci_nome, turmas.cod AS turma_cod, salas.num, salas.idUsuario, campus.nome AS campus_nome, predios.nome AS predio_nome
            FROM salas
            JOIN campus on salas.idCampus = campus.id
            JOIN predios on salas.idPredio = predios.id
            JOIN turmas on salas.idTurma = turmas.id
            JOIN disciplinas on turmas.idDisc = disciplinas.id
            WHERE disciplinas.cod like "%'.$text.'%" OR disciplinas.nome like "%'.$text.'%"
            GROUP BY turmas.id
            ORDER BY disciplinas.nome
        ');
    }

    public function get_salas_by_user($userid, $limit, $offset) {
        $subquery = $this->get_salas('', $limit, $offset);
        $subquery = $this->db->last_query();

        return $this->db->query('
            SELECT subquery.*
            FROM ('
                .$subquery.
            ') AS subquery
            JOIN usuarios on usuarios.id = subquery.idUsuario
            AND usuarios.id = '.$userid.'
            ORDER BY subquery.disci_nome'
        );
    }
}
