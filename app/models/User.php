<?php
class User extends Model
{
    public function getAll()
    {
        $stmt = $this->db->query("SELECT id, nombre, email, rol, activo, creado_en FROM usuarios ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $sql = "INSERT INTO usuarios (nombre, email, password, rol, activo, creado_en)
                VALUES (:nombre, :email, :password, :rol, 1, NOW())";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':nombre' => $data['nombre'],
            ':email' => $data['email'],
            ':password' => password_hash($data['password'], PASSWORD_DEFAULT),
            ':rol' => $data['rol']
        ]);
    }

    public function find($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE id = :id LIMIT 1");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $data)
    {
        $params = [
            ':nombre' => $data['nombre'],
            ':email' => $data['email'],
            ':rol' => $data['rol'],
            ':activo' => $data['activo'],
            ':id' => $id
        ];
        $sql = "UPDATE usuarios SET nombre=:nombre, email=:email, rol=:rol, activo=:activo";
        if (!empty($data['password'])) {
            $sql .= ", password=:password";
            $params[':password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        }
        $sql .= " WHERE id=:id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM usuarios WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }
    
    // Ya existe la función authenticate en tu modelo
}