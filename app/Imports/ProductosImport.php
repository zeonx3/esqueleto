<?php

namespace App\Imports;

use App\Models\Categoria;
use App\Models\Empresa;
use App\Models\Producto;
use App\Models\Unimedida;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToCollection;


class ProductosImport implements ToCollection, WithHeadingRow
{
    public $result = '';
    public $codigo = 0;

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {

            $pro_nombre = isset($row['nombre']) ? trim($row['nombre']) : '';
            $pro_tipo = isset($row['tipo']) ? trim($row['tipo']) : '';
            $pro_descripcion = isset($row['descripcion']) ? trim($row['descripcion']) : '';
            $pro_neto = isset($row['neto']) ? trim($row['neto']) : '';
            $pro_bruto = isset($row['bruto']) ? trim($row['bruto']) : '';
            $pro_exento = isset($row['exento']) ? trim($row['exento']) : '';
            $pro_pesable = isset($row['pesable']) ? trim($row['pesable']) : '';
            $pro_uni_medida = isset($row['uni_medida']) ? trim($row['uni_medida']) : '';
            $exc_familia = isset($row['familia']) ? trim($row['familia']) : '';
            $pro_codigo = isset($row['codigo']) ? trim($row['codigo']) : '';
            $empresa = isset($row['empresa']) ? trim($row['empresa']) : '';
            
            $pro_int_esp = isset($row['impuesto_esp']) ? trim($row['impuesto_esp']) : '';
            $pro_codbarra = isset($row['pro_codbarra']) ? trim($row['pro_codbarra']) : '';

            $id_empresa = Empresa::where('emp_nombre',$empresa)->first();

            if($id_empresa == null)
            {
                $this->result = "Nombre de empresa no valido o mal escrito (debe ser igual que en el sistema)";
                $this->codigo = 201;

                break;
            }
            if($pro_nombre == '')
            {
                $this->result = "Debes ingresar el nombre";
                $this->codigo = 401;
                break;
            }
            if($pro_descripcion == '')
            {
                $this->result = "Debes ingresar la descripcion del producto ".$pro_nombre;
                $this->codigo = 401;
                break;
            }

            if($id_empresa->id == 13)
            {
                if($exc_familia == '')
                {
                    $this->result = "Debes ingresar la familia del producto";
                    $this->codigo = 201;
                    break;
                }
                $fami = Categoria::where('cat_nombre',$exc_familia)->first();
                if(!isset($fami))
                {
                    $this->result = "Nombre de Familia no valido (debe ser el mimso nombre que tiene en el programada)";
                    $this->codigo = 201;
                    break;
                }

                $check_cod = Producto::where('id_empresa',$id_empresa->id)->where('pro_sku',$pro_codigo)->first();
                if(isset($check_cod))
                {
                    $this->result = "El Codigo del producto ".$pro_nombre." ya esta registrado";
                    $this->codigo = 201;
                    break;
                }

                $producto = new Producto();
                $producto->pro_tipo = 2;
                $producto->pro_nombre = $pro_nombre;
                $producto->pro_descripcion = $pro_descripcion;
                $producto->pro_bruto = 0;
                $producto->pro_neto = 0;
                $producto->pro_exento = 0;
                $producto->pro_pesable = 0;
                $producto->pro_int_esp = 0;
                $producto->pro_uni_medida = 0;
                $producto->pro_sku = $pro_codigo;
                $producto->pro_codbarra = '';
                $producto->id_empresa = $id_empresa->id;
                $producto->id_categoria =  $fami->id;
                $producto->save();

            }
            else
            {

                if($pro_tipo != 'Servicio' && $pro_tipo != 'Producto')
                {
                    $this->result = "El tipo debe ser 'Servicio' o 'Producto' ";
                    break;
                }

                if($pro_tipo == "Servicio")
                {
                    if($exc_familia == '')
                    {
                        $this->result = "Debes ingresar la familia del servicio";
                        $this->codigo = 201;
                        break;
                    }
                    $fami = Categoria::where('cat_nombre',$exc_familia)->first();
                    if(!isset($fami))
                    {
                        $this->result = "Nombre de Familia no valido (debe ser el mimso nombre que tiene en el programada)";
                        $this->codigo = 201;
                        break;
                    }

                    $producto = new Producto();
                    $producto->pro_tipo = 1;
                    $producto->pro_nombre = $pro_nombre;
                    $producto->pro_descripcion = $pro_descripcion;
                    $producto->pro_bruto = $pro_bruto;
                    $producto->pro_neto = $pro_neto;
                    $producto->pro_exento = $pro_exento;
                    $producto->pro_pesable = 0;
                    $producto->pro_int_esp = 0;
                    $producto->pro_pesable = 0;
                    $producto->pro_uni_medida = 0;
                    $producto->pro_sku = $pro_codigo;
                    $producto->pro_codbarra = $pro_codbarra;
                    $producto->id_empresa = $id_empresa->id;
                    $producto->id_categoria =  $fami->id;
                    $producto->save();

                }
                else if($pro_tipo == "Producto")
                {

                    if($pro_uni_medida == '')
                    {
                        $this->result = "Debes ingresar la unidad de medida del producto";
                        $this->codigo = 201;
                        break;
                    }
                    $unidm = Unimedida::where('unid_nombre',$pro_uni_medida)->first();
                    if(!isset($unidm))
                    {
                        $unidm = new Unimedida();
                        $unidm->unid_nombre = $pro_uni_medida;
                        $unidm->unid_nombre_corto = "-";
                        $unidm->save();
                    }

                    if($exc_familia == '')
                    {
                        $this->result = "Debes ingresar la familia del producto";
                        $this->codigo = 201;
                        break;
                    }
                    $fami = Categoria::where('cat_nombre',$exc_familia)->first();
                    if(!isset($fami))
                    {
                        $this->result = "Nombre de Familia no valido (debe ser el mimso nombre que tiene en el programada)";
                        $this->codigo = 201;
                        break;
                    }

                    $check_cod = Producto::where('id_empresa',$id_empresa->id)->where('pro_sku',$pro_codigo)->first();
                    if(isset($check_cod))
                    {
                        $this->result = "El Codigo del producto ".$pro_nombre." ya esta registrado";
                        $this->codigo = 201;
                        break;
                    }

                    if($pro_exento != 'Si' && $pro_exento != 'No')
                    {
                        $this->result = "Debes ingresar el exento del producto ".$pro_nombre." (Si/No)";
                        $this->codigo = 201;
                        break;
                    }

                    $producto = new Producto();
                    $producto->pro_tipo = 2;
                    $producto->pro_nombre = $pro_nombre;
                    $producto->pro_descripcion = $pro_descripcion;
                    $producto->pro_bruto = $pro_bruto;
                    $producto->pro_neto = $pro_neto;
                    $producto->pro_exento = $pro_exento;
                    $producto->pro_pesable = $pro_pesable;
                    $producto->pro_int_esp = $pro_int_esp;
                    $producto->pro_pesable = $pro_pesable;
                    $producto->pro_uni_medida = $unidm->id;
                    $producto->pro_codigo = $pro_codigo;
                    $producto->pro_codbarra = $pro_codbarra;
                    $producto->id_empresa = $id_empresa->id;
                    $producto->id_categoria =  $fami->id;
                    $producto->save();
        
                }
            }
        }
        $this->result = "Se importaron los Productos y/o Servicios correctamente!.";
        $this->codigo = 200;
    }

    public function getRowMessage(): string {
        return $this->result;
    }
}
